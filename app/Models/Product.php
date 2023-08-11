<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name', 'ingredients', 'description'];

    protected static function booted(): void
    {
        static::addGlobalScope(new TenantScope);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function portions()
    {
        return $this->hasMany(Portion::class);
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

    public function getIngredientsAttribute()
    {
        return [
            'ru' => $this->ingredients_ru,
            'uz' => $this->ingredients_uz,
            'en' => $this->ingredients_en,
            'tr' => $this->ingredients_tr,
        ];
    }

    public function getDescriptionAttribute()
    {
        return [
            'ru' => $this->description_ru,
            'uz' => $this->description_uz,
            'en' => $this->description_en,
            'tr' => $this->description_tr,
        ];
    }
}
