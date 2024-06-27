<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher; // Ensure this line is present
use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {/*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test' . uniqid() . '@example.com', // Ensure unique email
        ]);
        

        if (Teacher::count() == 0) {
            $this->call(TeacherSeeder::class);
        }*/
        /*
        City::factory(20)->create();
        Client::factory(20)->create();
        */
        // Create some students and teachers
        $students = Student::factory(20)->create();
        $teachers = Teacher::factory(10)->create();

        // Attach students to teachers (many-to-many relationship)
        $teachers->each(function ($teacher) use ($students) {
            $teacher->students()->attach(
                $students->random(rand(1, 5))->pluck('id')->toArray()
            );
        });

        // Assign a random teacher to each student (one-to-many relationship)
        $students->each(function ($student) use ($teachers) {
            $student->teacher_id = $teachers->random()->id;
            $student->save();
        });

        // Assign a random student to each teacher (one-to-many relationship)
        $teachers->each(function ($teacher) use ($students) {
            $teacher->student_id = $students->random()->id;
            $teacher->save();
        });
    }
   
}
