<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'oop',
             'code' =>'sbdkfkjds',
             'hour' => '3',
            'status'=>'1',
        ]);

        Subject::create([
            'name' => 'pop',
             'code' =>'sbdkfkjds',
             'hour' => '3',
            'status'=>'1',
        ]);

        Subject::create([
            'name' => 'opo',
             'code' =>'sbdkfkjds',
             'hour' => '3',
            'status'=>'1',
        ]);

        Subject::create([
            'name' => 'poo',
             'code' =>'sbdkfkjds',
             'hour' => '3',
            'status'=>'1',
        ]);
    }
}
