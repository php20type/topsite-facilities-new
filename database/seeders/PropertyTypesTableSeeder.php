<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the property type data to be inserted
        $propertyTypes = [
            ['name' => 'Residential'],
            ['name' => 'Land'],
            ['name' => 'Commercial'],
        ];

        // Insert the property types into the 'property_types' table using Eloquent
        foreach ($propertyTypes as $propertyType) {
            PropertyType::create($propertyType);
        }
    }
}
