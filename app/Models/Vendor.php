<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'contacts' => 'array',
        'socials' => 'array',
        'languages' => 'array',
    ];

    protected static function booted(): void
    {
        $user = auth()->user();
        static::addGlobalScope('tenant', function (Builder $builder) use ($user) {
            if ($user === null or $user->is_admin) {
                return; // do not apply to public APIs and admin
            } elseif ($user->branch_id) {
                $builder->where('id', $user->branch->vendor_id);
            } elseif ($user->vendor_id) {
                $builder->where('id', $user->vendor_id);
            }
        });
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function scopeOwnedBy(Builder $query, User $user): void
    {
        if (! $user->is_admin) {
            $query->where('id', $user->vendor_id);
        }
    }
}
