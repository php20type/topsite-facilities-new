<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Cleaning', 'status' => 1],
            ['name' => 'Carpeting', 'status' => 1],
            ['name' => 'Paint work', 'status' => 1],
            ['name' => 'Plumbing', 'status' => 1],
        ];

        // Insert the services into the 'services' table using Eloquent
        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
