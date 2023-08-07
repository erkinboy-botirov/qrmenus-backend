<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class EfendiDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
                    'coords' => [41.30246, 69.28775],
                ],
                [
                    'name' => 'Efendi Restaurant 2',
                    'phone' => '(95) 177-09-93',
                    'coords' => [41.327882, 69.269219],
                ],
            ],
            'languages' => ['ru', 'en'],
        ]);

        $branch = $vendor->branches()->create([
            'name_ru' => 'Эфенди Лабзак',
            'name_uz' => 'Efendi Labzak',
            'name_en' => 'Efendi Labzak',
            'name_tr' => 'Efendi Labzak',
        ]);

        User::create([
            'name' => 'Alisher Akbaraliev',
            'email' => 'a.akbaraliev@qrmenuz.uz',
            'email_verified_at' => now(),
            'password' => 'password',
            'vendor_id' => $vendor->id,
        ]);

        $category = $branch->categories()->create([
            'name_ru' => 'Салат',
            'name_en' => 'Salad',
            'order' => 1,
        ]);

        $product = $category->products()->create([
            'name_ru' => 'ВИНЕГРЕТ',
            'name_en' => 'VEGETABLE SALAD',
            'ingredients_ru' => 'СВЕКЛА, КВАШЕННАЯ КАПУСТА, СОЛЕННЫЕ ОГУРЦЫ',
            'ingredients_en' => 'BEETS, SAUERKRAUT PICKLES',
            'image' => 'https://efendi.qrmenus.uz/images/salat/salat_1.webp',
            'display_price' => 25000,
        ]);

        $product->portions()->createMany([
            [
                'title_ru' => '1x',
                'title_en' => '1x',
                'price' => 25000,
            ],
            [
                'title_ru' => '0.5x',
                'title_en' => '0.5x',
                'price' => 20000,
            ],
        ]);
    }
}
