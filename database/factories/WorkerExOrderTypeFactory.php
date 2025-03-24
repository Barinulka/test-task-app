<?php

namespace Database\Factories;

use App\Models\OrderType;
use App\Models\Worker;
use App\Models\WorkerExOrderType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkerExOrderType>
 */
class WorkerExOrderTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worker_id' => Worker::all()->random()->id,
            'order_type_id' => OrderType::all()->random()->id,
        ];
    }
}
