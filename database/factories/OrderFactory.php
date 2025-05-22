<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::factory()->create();
        $count = $this->faker->numberBetween(1, 10);

        return [
            'customer_name' => $this->faker->name(),
            'product_id' => $product->id,
            'count' => $count,
            'total_price' => $product->price * $count,
            'comment' => $this->faker->randomElement([null, $this->faker->text()]),
        ];
    }
}
