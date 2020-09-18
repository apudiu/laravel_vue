<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = $this->getProduct();

        return [
            'product_id' => $product->id,
            'price' => $product->price,
            'qty' => $this->faker->randomNumber(1),
            'delivered' => $this->faker->randomElement([0, 1]),
        ];
    }

    private function getProduct() {

        $products = Product::get(['id', 'price']);

        $selectedIndex = $this->faker->numberBetween(0, (count($products) -1));

        return $products[$selectedIndex];
    }
}
