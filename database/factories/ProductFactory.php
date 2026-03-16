<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(20),
            'stock' => random_int(1,10),
            'price' => rand(200,2000),
        ];
    }
}