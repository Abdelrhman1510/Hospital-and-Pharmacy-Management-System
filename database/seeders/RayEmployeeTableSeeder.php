<?php

namespace Database\Seeders;

use App\Models\PharmacyEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RayEmployeeTableSeeder extends Seeder
{

    public function run()
    {
        $ray_employee = new PharmacyEmployee();
        $ray_employee->name = 'Ibrahim';
        $ray_employee->email = 'ibrahim@gmail.com';
        $ray_employee->password = Hash::make('12345678');
        $ray_employee->save();
    }
}
