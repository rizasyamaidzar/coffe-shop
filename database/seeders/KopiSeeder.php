<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KopiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Espresso',
                'description' => 'A strong coffee brewed by forcing a small amount of nearly boiling water through finely-ground coffee beans.',
                'price' => 15000,
                'type' => 'drinks',
                'image' => 'menu-1.jpg'
            ],
            [
                'name' => 'Americano',
                'description' => 'Espresso diluted with hot water, giving it a similar strength but different flavor than traditional brewed coffee.',
                'price' => 18000,
                'type' => 'foods',
                'image' => 'menu-3.jpg'
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'A popular coffee drink made with equal parts espresso, steamed milk, and frothed milk.',
                'price' => 20000,
                'type' => 'drinks',
                'image' => 'menu-4.jpg'
            ],
            [
                'name' => 'Latte',
                'description' => 'Espresso mixed with steamed milk and a small amount of milk foam, known for its creamy taste.',
                'price' => 22000,
                'type' => 'drinks',
                'image' => 'menu-1.jpg'
            ],
            [
                'name' => 'Mocha',
                'description' => 'A chocolate-flavored coffee drink made with espresso, steamed milk, and chocolate syrup.',
                'price' => 25000,
                'type' => 'drinks',
                'image' => 'menu-2.jpg'
            ],
            [
                'name' => 'Macchiato',
                'description' => 'A shot of espresso with a small amount of foamed milk on top.',
                'price' => 20000,
                'type' => 'drinks',
                'image' => 'menu-2.jpg'
            ],
            [
                'name' => 'Kopi Tubruk',
                'description' => 'A shot of espresso with a small amount of foamed milk on top.',
                'price' => 20000,
                'type' => 'drinks',
                'image' => 'menu-2.jpg'
            ],
            [
                'name' => 'Caramell Macchiato',
                'description' => 'A shot of espresso with a small amount of foamed milk on top.',
                'price' => 20000,
                'type' => 'drinks',
                'image' => 'menu-2.jpg'
            ],
            [
                'name' => 'Macchiato',
                'description' => 'A shot of espresso with a small amount of foamed milk on top.',
                'price' => 20000,
                'type' => 'drinks',
                'image' => 'menu-2.jpg'
            ],
            [
                'name' => 'Carabiean',
                'description' => 'A shot of espresso with a small amount of foamed milk on top.',
                'price' => 20000,
                'type' => 'drinks',
                'image' => 'menu-1.jpg'
            ],
            [
                'name' => 'Flat White',
                'description' => 'A smooth coffee with a creamy texture, made with espresso and microfoam milk.',
                'price' => 23000,
                'type' => 'foods',
                'image' => 'menu-2.jpg'
            ]
        ]);
    }
}
