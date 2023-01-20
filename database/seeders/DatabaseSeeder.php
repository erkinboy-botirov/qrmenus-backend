<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

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
                    'coords' => [41.30246, 69.28775],
                ],
                [
                    'name' => 'Efendi Restaurant 2',
                    'phone' => '(95) 177-09-93',
                    'coords' => [41.327882, 69.269219],
                ],
            ],
            'languages' => ['en', 'ru'],
        ]);

        $branch = $vendor->branches()->create([
            'name' => 'Efendi Labzak',
        ]);

        User::create([
            'name' => 'Erkin Botirov',
            'email' => 'e.botirov97@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'vendor_id' => $vendor->id,
        ]);

        $category = $branch->categories()->create([
            'name' => [
                'en' => 'Salad',
                'ru' => 'Салат',
            ],
            'order' => 1,
        ]);

        $category->products()->createMany([
            [
                'name' => [
                    'en' => 'VEGETABLE SALAD',
                    'ru' => 'ВИНЕГРЕТ',
                ],
                'ingredients' => [
                    'en' => 'BEETS, SAUERKRAUT PICKLES',
                    'ru' => 'СВЕКЛА, КВАШЕННАЯ КАПУСТА, СОЛЕННЫЕ ОГУРЦЫ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 25000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 25000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_1.webp',
            ],
            [
                'name' => [
                    'en' => 'CHARLIE',
                    'ru' => 'ЧАРЛИ',
                ],
                'ingredients' => [
                    'en' => 'MARINATED MUSHROOMS, CUCUMBER CLIVES CHEESE',
                    'ru' => 'МАРИНОВАННЫЕ ГРИБЫ, ОГУРЦЫ, ОЛИВКИ, СЫР',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_2.webp',
            ],
            [
                'name' => [
                    'en' => 'GREEK SALAD',
                    'ru' => 'ГРЕЧЕСКИЙ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'FRESH CUCUMBER, TOMATOES, GREENS OLIVES FETAKI',
                    'ru' => 'СВЕЖИЕ ОГУРЦЫ, ПОМИДОРЫ, ЗЕЛЕНЬ, ОЛИВКИ, ФЕТАКИ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 40000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 40000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 30000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_3.webp',
            ],
            [
                'name' => [
                    'en' => 'OLIVIER',
                    'ru' => 'ОЛИВЬЕ',
                ],
                'ingredients' => [
                    'en' => 'MEAT, EGGS, POTATOES, CARROTS PEAS, MAYONNAISE',
                    'ru' => 'МЯСО, ЯЙЦА, КАРТОФЕЛЬ, МОРКОВЬ, ГОРОШЕК, МАЙОНЕЗ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_4.webp',
            ],
            [
                'name' => [
                    'en' => 'AMERICAN SALAD',
                    'ru' => 'АМЕРИКАНСКИЙ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'CHICKEN MEATMUSHROOMS. CUCUMBER CORN, PEAS',
                    'ru' => 'КУРИНОЕ МЯСО. ГРИБЫ, ОГУРЕЦ, КУКУРУЗА, ГОРОШЕК',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_5.webp',
            ],
            [
                'name' => [
                    'en' => 'MALE CAPRICE',
                    'ru' => 'МУЖСКОЙ КАПРИЗ',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => '',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_6.webp',
            ],
            [
                'name' => [
                    'en' => 'TURKISH SALAD',
                    'ru' => 'ТУРЕЦКИЙ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'FRESH CUCUMBER, TOMATOES, CARROTS, RED CABBAGE, GREENS, LEMON',
                    'ru' => 'СВЕЖИЕ ОГУРЦЫ ПОМИДОРЫ КРАСНАЯ КАПУСТА, МОРКОВЬ, ЗЕЛЕНЬ, ЛИМОН, ОЛИВКИ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_7.webp',
            ],
            [
                'name' => [
                    'en' => 'JAPANESE SALAD',
                    'ru' => 'ЯПОНСКИЙ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'MEAT, TOMATOES, CUCUMBERS, KOREAN SALT SOY',
                    'ru' => 'МЯСО, ПОМИДОРЫ, ОГУРЦЫ, КОРЕЙСКАЯ СОЛЬ, СОЯ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 50000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 50000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 30000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_8.webp',
            ],
            [
                'name' => [
                    'en' => 'DOLMA | ETLI DOLMA',
                    'ru' => 'ДОЛМА | МЯСНАЯ ДОЛМА',
                ],
                'ingredients' => [
                    'en' => 'STUFFED GRAPE LEAVES',
                    'ru' => 'ГОЛУБЦЫ ИЗ ВИНОГРАДНЫХ ЛИСТЬЕВ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_9.webp',
            ],
            [
                'name' => [
                    'en' => 'ZHAZHIK',
                    'ru' => 'ЖАЖИК',
                ],
                'ingredients' => [
                    'en' => 'YOGHURT, CUCUMBER, RED BELL PEPPERS NANE',
                    'ru' => 'КИСЛОЕ МОЛОКО, ОГУРЦЫ, МЯТА',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_10.webp',
            ],
            [
                'name' => [
                    'en' => 'FRESH SALAD',
                    'ru' => 'СВЕЖИЙ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'FRESH CUCUMBER, TOMATOES, ONIONS, GREENS LEMON',
                    'ru' => 'СВЕЖИЕ ОГУРЦЫ, ПОМИДОРЫ ЛУК, ЗЕЛЕНЫ, ЛИМОН',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 25000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_11.webp',
            ],
            [
                'name' => [
                    'en' => 'EGGPLANT SALAD',
                    'ru' => 'САЛАТ ИЗ БАКЛАЖАН',
                ],
                'ingredients' => [
                    'en' => 'ECOPLANTS GREEN AND RED BELL PEPPERS, TOMATOES ONIONS',
                    'ru' => 'БАКЛАЖАНЫ ЗЕЛЕНЫЙ И КРАСНЫЙ ПЕРЕЦ, ПОМИДОРЫ. ЛУК',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_12.webp',
            ],
            [
                'name' => [
                    'en' => 'SYUZMA',
                    'ru' => 'СУЗЬМА',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => '',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 25000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 25000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_13.webp',
            ],
            [
                'name' => [
                    'en' => 'CORPORATE SALAD FROM EFENDI',
                    'ru' => 'ФИРМЕННЫЙ САЛАТ ОТ ЭФЕНДИ',
                ],
                'ingredients' => [
                    'en' => 'FRESH CUCUMBERS, TOMATOES, RED CABBAGE CARROTS, GREENS',
                    'ru' => 'СВЕЖИЕ ОГУРЦЫ. ПОМИДОРЫ КРАСНАЯ, КАПУСТА, МОРКОВЬ, ЗЕЛЕНЫ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 23000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_14.webp',
            ],
            [
                'name' => [
                    'en' => 'EZME SALAD',
                    'ru' => 'ЭЗМЕ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'FRESH TOMATOES, BELL PEPPER, ONION GARLIC, GREENERY',
                    'ru' => 'СВЕЖИЕ ПОМИДОРЫ, БОЛГАРСКИЙ, ПЕРЕЦ, ЛУК, ЧЕСНОК, ЗЕЛЕНЬ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_15.webp',
            ],
            [
                'name' => [
                    'en' => 'XAYDARI SALAD',
                    'ru' => 'ХАЙДАРИ САЛАТ',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => 'СУЗМА, КАЙМАК, БАКЛАЖАН, МАСЛО СЛИВ, МАСЛО ОЛИВ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_16.webp',
            ],
            [
                'name' => [
                    'en' => 'ISTANBUL SALAD',
                    'ru' => 'ИСТАНБУЛ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'FRESH CUCUMBER, TOMATOES, RED CABBAGE, GREENS, CORN, LEMON',
                    'ru' => 'СВЕЖИЕ ОГУРЦЫ, ПОМИДОРЫ, КРАСНАЯ КАПУСТА, КУКУРУЗА, ЛИСТЬЯ САЛАТА, ЛИМОН',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_17.webp',
            ],
            [
                'name' => [
                    'en' => 'GREEN SALAD',
                    'ru' => 'ЗЕЛЕНЫЙ САЛАТ',
                ],
                'ingredients' => [
                    'en' => 'FRESH CUCUMBER, TOMATOES, GREENS',
                    'ru' => 'СВЕЖИЕ ОГУРЦЫ, ПОМИДОРЫ, ЗЕЛЕНЬ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_18.webp',
            ],
            [
                'name' => [
                    'en' => 'TRIO',
                    'ru' => 'ТРИО',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => '',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 18000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 18000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_19.webp',
            ],
            [
                'name' => [
                    'en' => 'CAESAR SALAD',
                    'ru' => 'ЦЕЗАРЬ',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => 'КУРИНОЕ МЯСО, ПОМИДОР, СУХАРИКИ, СЫР ПАРМЕЗАН, СОУС \"ЦЕЗАРЬ\"',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 50000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 50000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/salat/salat_20.webp',
            ],
        ]);

        // New category added
        $category = $branch->categories()->create([
            'name' => [
                'en' => 'Soup',
                'ru' => 'Суп',
            ],
            'order' => 2,
        ]);

        $category->products()->createMany([
            [
                'name' => [
                    'en' => 'LЕNTІL SOUP',
                    'ru' => 'ЧЕЧЕВИЧНЫЙ СУП',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => 'ПОДАЕТСЯ С ЛИМОНОМ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_1.webp',
            ],
            [
                'name' => [
                    'en' => 'YAYLA',
                    'ru' => 'ЯЙЛА',
                ],
                'ingredients' => [
                    'en' => 'RICE, YOGURT AND NANE',
                    'ru' => 'РИС, КИСЛОЕ МОЛОКО, НАНЕ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 25000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 25000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_2.webp',
            ],
            [
                'name' => [
                    'en' => 'KALAPACHA',
                    'ru' => 'КАЛАПАЧА',
                ],
                'ingredients' => [
                    'en' => 'SOUP OF BEEF TONGUE',
                    'ru' => 'СУП ИЗ ЯЗЫКА',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_3.webp',
            ],
            [
                'name' => [
                    'en' => 'KELLE PACA ORIGINAL ÇORBASI',
                    'ru' => 'КАЛАПАЧА ОРИГИНАЛ СУП',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => '',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 50000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 50000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_4.webp',
            ],
            [
                'name' => [
                    'en' => 'CHICKEN SOUP',
                    'ru' => 'КУРИНЫЙ БУЛЬОН',
                ],
                'ingredients' => [
                    'en' => 'CHICKEN FILLET, YOGURT, EGG',
                    'ru' => 'КУРИНОЕ ФИЛЕ, ШАХРИЯ, КИСЛОЕ МОЛОКО, ЯЙЦО',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_5.webp',
            ],
            [
                'name' => [
                    'en' => 'EZOGELIN SOUPMENEMEN',
                    'ru' => 'СУП ЭЗОГЕЛИН',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => 'ИЗ ЧЕЧЕВИЦЫ (КРАСНЫЙ) ПОДАЕТСЯ С ЛИМОНОМ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_6.webp',
            ],
            [
                'name' => [
                    'en' => 'ІКSHEMBE',
                    'ru' => 'ИКШЕМБЕ',
                ],
                'ingredients' => [
                    'en' => 'TRIPE SOUP WITH YOGURT',
                    'ru' => 'СУП ИЗ ТРЕБУХИ И КИСЛОГО МОЛОКА',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_7.webp',
            ],
            [
                'name' => [
                    'en' => 'DUYUN',
                    'ru' => 'ДУЮН',
                ],
                'ingredients' => [
                    'en' => 'SOUP WITH MILK AND YOGURT',
                    'ru' => 'СУП ИЗ МЯСА И КИСЛОГОМОЛОКА',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 30000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 30000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 20000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_8.webp',
            ],
            [
                'name' => [
                    'en' => 'MUTTON SOUP',
                    'ru' => 'МЯСНАЯ ХАШЛАМА',
                ],
                'ingredients' => [
                    'en' => 'LAMB SOUP WITH POTATOES AND CARROTS',
                    'ru' => 'СУП ИЗ БАРАНИНЫ С КАРТОШКОЙ И МОРКОВЬЮ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 60000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 60000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_9.webp',
            ],
            [
                'name' => [
                    'en' => 'IZMIR KÖFTE',
                    'ru' => 'ИЗМИР КОФТЕ',
                ],
                'ingredients' => [
                    'en' => 'CHOPPED BEEF MEAT WITH SPICES',
                    'ru' => 'ГОВЯЖИЙ ФАРШ СО СПЕЦИЯМИ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 55000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 55000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 40000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_10.webp',
            ],
            [
                'name' => [
                    'en' => 'ETLI NOHUT',
                    'ru' => 'ЭТЛИ НОХАТ',
                ],
                'ingredients' => [
                    'en' => 'MEAT, ONIONS AND TOMATOES',
                    'ru' => 'ГОРОХ, МЯСО, ЛУК И ТОМАТЫ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 45000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 45000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 30000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_11.webp',
            ],
            [
                'name' => [
                    'en' => 'TAS KEBAB',
                    'ru' => 'ТАС КЕБАБ',
                ],
                'ingredients' => [
                    'en' => 'BEEF, POTATOES, TOVATOES AND PEPPERS',
                    'ru' => 'ГОВЯДИНА, КАРТОФЕЛЬ, ПОМИДОРЫ И ПЕРЕЦ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 50000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 50000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 35000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_12.webp',
            ],
            [
                'name' => [
                    'en' => 'CHICKEN SOUP',
                    'ru' => 'КУРИНАЯ ХАШЛАМА',
                ],
                'ingredients' => [
                    'en' => 'CHICKEN, POTATOES AND CARROTS',
                    'ru' => 'КУРИНОЕ МЯСО, КАРТОФЕЛЬ, МОРКОВЬ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 45000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 45000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 30000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_13.webp',
            ],
            [
                'name' => [
                    'en' => 'BEANS SOUP',
                    'ru' => 'КУРУ ФАСУЛЬЕ',
                ],
                'ingredients' => [
                    'en' => 'WHITE BEANS, MEAT ONIONS AND TOMATOES',
                    'ru' => 'БЕЛАЯ ФАСОЛЬ МЯСО, ЛУК И ТОМАТЫ',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 45000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 45000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 30000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/soup/soup_14.webp',
            ],
        ]);

        // New category added
        $category = $branch->categories()->create([
            'name' => [
                'en' => 'Breakfast',
                'ru' => 'Завтрак',
            ],
            'order' => 3,
        ]);
        $category->products()->createMany([
            [
                'name' => [
                    'en' => '',
                    'ru' => '',
                ],
                'ingredients' => [
                    'en' => '',
                    'ru' => '',
                ],
                'description' => [
                    'en' => '',
                    'ru' => '',
                ],
                'display_price' => 35000,
                'portions' => [
                    [
                        'text' => '1x',
                        'price' => 35000,
                    ],
                    [
                        'text' => '0.5x',
                        'price' => 25000,
                    ],
                ],
                'image' => 'https://efendi.qrmenus.uz/images/breakfast/breakfast_1.webp',
            ],
        ]);
    }
}
