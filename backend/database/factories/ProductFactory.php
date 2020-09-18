<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() :array
    {
        return [
            'title' => ucfirst($this->faker->unique()->words(2, true)),
            'slug' => Str::limit($this->faker->unique()->slug, 30, 'd'),
            'price' => $this->faker->numberBetween(200, 1800),
            'details' => $this->faker->words(10, true),
        ];
    }
}
