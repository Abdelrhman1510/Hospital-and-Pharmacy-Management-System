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
        $this->call( [
        //     UserTableSeeder::class,
        //     AdminTableSeeder::class,
        //    // AppointmentTableSeeder::class,

        //     SectionTableSeeder::class,
        //     DoctorTableSeeder::class,
        //     ImageTableSeeder::class,
        //     PatientTableSeeder::class,
        //     RayEmployeeTableSeeder::class,
        //     ServiceTableSeeder::class,
        MedicineSectionSeeder::class,
        MedicineSeeder::class,


        ]);
    }
}
