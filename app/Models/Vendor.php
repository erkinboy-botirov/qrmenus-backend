<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'contacts' => 'array',
        'socials' => 'array',
        'languages' => 'array'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
