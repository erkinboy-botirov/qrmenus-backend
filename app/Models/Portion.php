<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
