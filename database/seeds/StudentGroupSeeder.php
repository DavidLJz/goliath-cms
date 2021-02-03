<?php

use Illuminate\Database\Seeder;
use App\Models\student_group;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new student_group;

        $group->name = 'Grupo 3-B';

        $group->save();
    }
}
