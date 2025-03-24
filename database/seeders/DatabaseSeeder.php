<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
           PassportClientSeeder::class,
           PartnershipSeeder::class,
           OrderTypeSeeder::class,
           UserSeeder::class,
           OrderSeeder::class,
           WorkerSeeder::class,
           OrderWorkerSeeder::class,
           WorkerExOrderTypeSeeder::class,
       ]);
    }
}
