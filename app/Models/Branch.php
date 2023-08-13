<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'vendor_id',
        'name_ru',
        'name_uz',
        'name_en',
        'name_tr',
    ];

    protected $appends = ['name'];

    protected static function booted(): void
    {
        $user = auth()->user();
        static::addGlobalScope('tenant', function (Builder $builder) use ($user) {
            if ($user === null || $user->is_admin) {
                // do not apply to public APIs and admin
            } elseif ($user->branch_id) {
                $builder->where('id', $user->branch_id);
            } elseif ($user->vendor_id) {
                $builder->where('vendor_id', $user->vendor_id);
            }
        });
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getNameAttribute(): array
    {
        return [
            'ru' => $this->name_ru,
            'uz' => $this->name_uz,
            'en' => $this->name_en,
            'tr' => $this->name_tr,
        ];
    }
}
