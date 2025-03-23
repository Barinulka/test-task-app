<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Passport\ClientRepository;

class PassportClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientRepository = app(ClientRepository::class);

        $clientRepository->createPersonalAccessClient(
            null, 'Personal Access Client', 'http://127.0.0.1:8000'
        );
    }
}
