<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->unique()->randomElement(['Neurology Section', 'Surgery Section', 'Pediatrics Section', 'Obstetrics and Gynecology Section', 'Ophthalmology Section', 'Internal Medicine Section']),
            'description'=>$this->faker->paragraph
        ];
    }
}
