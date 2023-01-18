<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $vendor = Vendor::create([
            'name' => 'Efendi',
            'subdomain' => 'efendi',
            'logo' => 'https://efendi.qrmenus.uz/img/logo.c506012a.svg',
            'favicon' => 'https://efendi.qrmenus.uz/favicon.ico',
            'contacts' => [
                [
                    'name' => 'Efendi Restaurant 1',
                    'phone' => '(71) 233-15-02',
                    'coords' => [41.302460, 69.287750]
                ],
                [
                    'name' => 'Efendi Restaurant 2',
                    'phone' => '(95) 177-09-93',
                    'coords' => [41.327882, 69.269219]
                ],
            ],
            'languages' => ['en', 'ru']
        ]);

        $branch = $vendor->branches()->create([
            'name' => 'Efendi Labzak'
        ]);

        User::create([
            'name' => 'Erkin Botirov',
            'email' => 'e.botirov97@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'vendor_id' => $vendor->id
        ]);

        $category = $branch->categories()->create([
            'name' => [
                'en' => 'Salad',
                'ru' => 'Салат'
            ],
            'order' => 1
        ]);

        $category->products()->createMany([
            [
                'name' => [
                    'en' => 'VEGETABLE SALAD',
                    'ru' => 'ВИНЕГРЕТ'
                ],
                'ingredients' => [
                    'en' => 'BEETS, SAUERKRAUT PICKLES',
                    'ru' => 'СВЕКЛА, КВАШЕННАЯ КАПУСТА, СОЛЕННЫЕ ОГУРЦЫ'
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => ''
                ],
                'display_price' => 25000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 25000
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000
                    ]
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_1.webp'
            ]
        ]);
    }
}
