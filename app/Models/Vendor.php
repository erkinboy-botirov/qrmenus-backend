<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use function Illuminate\Events\queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Vendor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'contacts' => 'array',
        'socials' => 'array',
        'languages' => 'array',
    ];

    protected $appends = [
        'logo_url',
        'favicon_url',
    ];

    public $afterCommit = true;

    protected static function booted(): void
    {
        $user = auth()->user();
        static::addGlobalScope('tenant', function (Builder $builder) use ($user) {
            if ($user === null || $user->is_admin) {
                // do not apply to public APIs and admin
            } elseif ($user?->branch_id) {
                $builder->where('id', $user->branch->vendor_id);
            } elseif ($user->vendor_id) {
                $builder->where('id', $user->vendor_id);
            }
        });

        static::updated(queueable(function (Vendor $vendor) {
            $vendor->load('branches.categories.products.portions');
            $vendor->setRelation('branches', $vendor->branches->keyBy('slug'));
            Cache::forever("vendor.{$vendor->subdomain}", $vendor);
        }));
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function scopeOwnedBy(Builder $query, User $user): void
    {
        if (! $user->is_admin) {
            $query->where('id', $user->vendor_id);
        }
    }

    public function getRouteKeyName(): string
    {
        return 'subdomain';
    }

    protected function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? Storage::url($this->logo) : null;
    }

    protected function getFaviconUrlAttribute(): ?string
    {
        return $this->favicon ? Storage::url($this->favicon) : null;
    }
}
