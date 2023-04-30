<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'bro',
             's_number' =>'4190001',
         
        ]);

        Student::create([
            'name' => 'boo',
             's_number' =>'4190006',
         
        ]);
        Student::create([
            'name' => 'so',
             's_number' =>'4190002',
         
        ]);
        Student::create([
            'name' => '',
             's_number' =>'4190003',
         
        ]);
        Student::create([
            'name' => 'b',
             's_number' =>'4190004',
         
        ]);

    }
}
