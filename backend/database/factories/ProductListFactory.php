<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductList>
 */
class ProductListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
    $faker = \Faker\Factory::create('en_US');

    return [
        'name' => $faker->words(2, true), // e.g., "Hair Gel"
        'description' => $faker->sentence(),
        'availability' => $faker->randomElement(['in stock', 'out of stock']),
        'category' => 'Hair',
        'price' => $faker->randomFloat(2, 50, 250), // from 50.00 to 250.00
        'posted_id' => $faker->numberBetween(0, 50),
    ];
    }
}
