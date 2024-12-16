<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicineSection;

class MedicineSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['name' => 'Pain Relief', 'description' => 'Medicines used to alleviate pain.'],
            ['name' => 'Antibiotics', 'description' => 'Medicines to treat bacterial infections.'],
            ['name' => 'Vitamins & Supplements', 'description' => 'Vitamins and dietary supplements.'],
            ['name' => 'Cough & Cold', 'description' => 'Medicines for cold and flu symptoms.'],
        ];
        foreach ($sections as $section) {
            MedicineSection::create($section);
        }
    }
}
