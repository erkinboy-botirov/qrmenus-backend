<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portion extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'name_ru',
        'name_uz',
        'name_en',
        'name_tr',
    ];

    protected $appends = ['name'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
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
