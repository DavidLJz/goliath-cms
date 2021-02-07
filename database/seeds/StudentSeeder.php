<?php

use Illuminate\Database\Seeder;
use App\Models\student_group;
use App\Models\student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new student;

        $student->name = 'Sofia';
        $student->email = 'sofia@gmail.com';
        $student->password = 'contrasena';
        $student->group_id = student_group::first()->id;

        $student->save();
    }
}
