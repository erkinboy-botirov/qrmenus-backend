<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
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
            if ($user === null or $user->is_admin) {
                return; // do not apply to public APIs and admin
            } elseif ($user->branch_id) {
                $builder->where('id', $user->branch_id);
            } elseif ($user->vendor_id) {
                $builder->where('vendor_id', $user->vendor_id);
            }
        });
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getNameAttribute()
    {
        return [
            'ru' => $this->name_ru,
            'uz' => $this->name_uz,
            'en' => $this->name_en,
            'tr' => $this->name_tr,
        ];
    }
}
