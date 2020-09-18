<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ImageFactory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(ProductFactory::class)
            ->count(20)
            ->has(ImageFactory::times(random_int(1, 4)), 'images')
            ->create()
        ;
    }
}
