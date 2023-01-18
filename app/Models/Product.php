<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
        'ingredients' => 'array',
        'description' => 'array',
        'portions' => 'array',
        'is_active' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
