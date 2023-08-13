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
            'logo' => null,
            'favicon' => null,
            'contacts' => [
                [
                    'name' => 'Efendi Restaurant 1',
                    'phone' => '(71) 233-15-02',
                    'latitude' => '41.30246',
                    'longitude' => '69.28775',
                ],
                [
                    'name' => 'Efendi Restaurant 2',
                    'phone' => '(95) 177-09-93',
                    'latitude' => '41.327882',
                    'longitude' => '69.269219',
                ],
            ],
            'languages' => ['en', 'ru'],
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

        User::create([
            'name' => 'Bakhodir Salikhov',
            'email' => 'b.salikhov@qrmenuz.uz',
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
            'branch_id' => $category->branch_id,
            'name_ru' => 'ВИНЕГРЕТ',
            'name_en' => 'VEGETABLE SALAD',
            'ingredients_ru' => 'СВЕКЛА, КВАШЕННАЯ КАПУСТА, СОЛЕННЫЕ ОГУРЦЫ',
            'ingredients_en' => 'BEETS, SAUERKRAUT PICKLES',
            'image' => null,
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
