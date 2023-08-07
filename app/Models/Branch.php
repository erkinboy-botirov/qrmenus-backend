<?php

namespace App\Models;

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
}
