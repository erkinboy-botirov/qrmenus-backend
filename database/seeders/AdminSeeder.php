<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Erkin Botirov',
            'email' => 'e.botirov97@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'is_admin' => 1,
        ]);
    }
}
