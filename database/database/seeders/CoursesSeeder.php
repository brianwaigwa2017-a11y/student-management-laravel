<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
  
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $faker=\Faker\Factory::create();
      // Course::truncate(); //this empties the table
    for($i=1;$i<=4;$i++){
    Course::create([
     'course_code' => 'BIT' . $faker->numberBetween(100, 999),
   'course_name' => $faker->randomElement([
    'Software Development',
    'Data Analytics',
    'Machine Learning',
    'Mobile Learning',
    ]),
     'description'=>$faker->sentence(),
     'duration'=>$faker->numberBetween(1,4)
    ]);
    }
    }
}
