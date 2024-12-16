<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Doctor;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $doctors =  Doctor::factory()->count(30)->create();

        // foreach ($doctors as $doctor){
        // $Appointments = Appointment::all()->random()->id;

        //     $doctor->doctorappointments()->attach($Appointments);
        // }
        // $doctors =  Doctor::factory()->count(30)->create();
        // $Appointments = Appointment::all();
        // Doctor::all()->each(function ($doctor) use ($Appointments) {
        //     $doctor->doctorappointments()->attach(
        //        $Appointments->random(rand(1,6))->pluck('id')->toArray()
        //     );
        // });
        Doctor::factory()->count(30)->create();





    }
}
