<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories  = DB::table('categories')->pluck('id')->toArray();

        return [
            'name' => $this->faker->words(2, true),
            'category_id' => $this->faker->randomElement($categories),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
