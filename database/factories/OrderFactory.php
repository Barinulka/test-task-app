<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderType;
use App\Models\Partnership;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
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
        return [
            'type_id' => OrderType::all()->random()->id,
            'partnership_id' => Partnership::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'description' => fake()->paragraph(),
            'date' => fake()->date(),
            'address' => fake()->address(),
            'amount' => fake()->randomDigit(),
            'status' => fake()->randomElement(['created', 'assigned', 'completed']),
        ];
    }
}
