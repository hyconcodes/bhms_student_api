<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Student::truncate();
        // $faker = Faker::create();

        // $departments = [
        //     'Computer Science', 'Mathematics', 'Physics', 'Chemistry', 'Biology',
        //     'Economics', 'History', 'Computer Education', 'Political Science', 'Sociology',
        //     'Philosophy', 'Geography', 'Statistics', 'Business Administration', 'Accounting',
        //     'Microbiology', 'Biochemistry', 'Linguistics', 'Psychology', 'English Education'
        // ];
        // $levels = ['100', '200', '300', '400', '500'];
        // $years = ['2021', '2022', '2023', '2024', '2025'];

        // for ($i = 0; $i < 200; $i++) {
        //     DB::table('students')->insert([
        //         'name' => $faker->name('male' === $faker->randomElement(['male', 'female']) ? 'male' : 'female', 'ng_NG'),
        //         'email' => $faker->unique()->safeEmail,
        //         'matric' => $faker->numberBetween(100000, 999999),
        //         'date_of_birth' => $faker->date('Y-m-d', '2005-12-31'),
        //         'gender' => $faker->randomElement(['Male', 'Female']),
        //         'phone' => $faker->phoneNumber,
        //         'address' => $faker->address,
        //         'department' => $faker->randomElement($departments),
        //         'level' => $faker->randomElement($levels),
        //         'year_of_study' => $faker->randomElement($years),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // $this->command->info('Student table seeded!');
        // $this->command->info('Total Students: ' . Student::count());


        // Student data
        Student::truncate();
        $faker = Faker::create('ng_NG');

        $departments = [
            'Computer Science',
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'Economics',
            'History',
            'Computer Education',
            'Political Science',
            'Sociology',
            'Philosophy',
            'Geography',
            'Statistics',
            'Business Administration',
            'Accounting',
            'Microbiology',
            'Biochemistry',
            'Linguistics',
            'Psychology',
            'English Education'
        ];

        $levels = ['100', '200', '300', '400', '500'];
        $years = ['2021', '2022', '2023', '2024', '2025'];

        // Start matric number from 2000
        $startMatric = 2000;

        // Insert exactly 5000 students
        $students = [];
        for ($i = 0; $i < 5000; $i++) {
            $students[] = [
                'name' => $faker->name($faker->randomElement(['male', 'female'])),
                'email' => $faker->unique()->safeEmail,
                'matric' => $startMatric + $i, // Sequential matric numbers starting from 2000
                'date_of_birth' => $faker->date('Y-m-d', '2005-12-31'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'department' => $faker->randomElement($departments),
                'level' => $faker->randomElement($levels),
                'year_of_study' => $faker->randomElement($years),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Batch insert into the database
        DB::table('students')->insert($students);
        $this->command->info('Total Students: ' . Student::count());
    }
}
