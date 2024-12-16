<?php

namespace Database\Seeders;

use App\Models\MedicineSection;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        // Fetch all medicine sections
        $sections = MedicineSection::all();

        foreach ($sections as $section) {
            foreach (range(1, 10) as $index) { // Add 10 medicines per section
                Medicine::create([
                    'medicine_section_id' => $section->id, // Foreign key to section
                    'name' => $faker->word . ' ' . $faker->randomElement(['Tablet', 'Syrup', 'Capsule']),
                    'brand' => $faker->company,
                    'price' => $faker->randomFloat(2, 5, 500), // Price between $5 and $500
                    'stock' => $faker->numberBetween(10, 200), // Stock quantity
                    'description' => $faker->sentence, // Optional description
                ]);
            }
        }

    }
}
