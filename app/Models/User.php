<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'vendor_id',
        'branch_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    protected static function booted(): void
    {
        $user = auth()->user();
        static::addGlobalScope('tenant', function (Builder $builder) use ($user) {
            if ($user === null || $user->is_admin) {
                // do not apply to public APIs and admin
            } elseif ($user->branch_id) {
                $builder->where('id', $user->id);
            } elseif ($user->vendor_id) {
                $builder->where(function ($query) use ($user) {
                    $query->whereIn('branch_id', $user->vendor->branches->pluck('id')->all())
                        ->orWhere('vendor_id', $user->vendor_id);
                });
            }
        });
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_admin || $this->vendor_id || $this->branch_id;
    }

    public function getIsNotAdminAttribute(): bool
    {
        return ! $this->is_admin;
    }

    public function getIsVendorOwnerAttribute(): bool
    {
        return (bool) $this->vendor_id;
    }

    public function getIsBranchOwnerAttribute(): bool
    {
        return (bool) $this->branch_id;
    }
}
