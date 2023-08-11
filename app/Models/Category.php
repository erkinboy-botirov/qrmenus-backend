<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'name_ru',
        'name_uz',
        'name_en',
        'name_tr',
        'order',
    ];

    protected $appends = ['name'];

    protected static function booted(): void
    {
        static::addGlobalScope(new TenantScope);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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
