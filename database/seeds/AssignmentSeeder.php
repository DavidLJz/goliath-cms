<?php

use Illuminate\Database\Seeder;
use App\Models\assignment;
use App\Models\subject;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignment = new assignment;

        $assignment->name = 'Tarea de Matematicas';
        $assignment->description = 'Las tablas de multiplicar';
        $assignment->start_time = time();
        $assignment->due_time = time() + 30000;
        $assignment->subject_id = subject::first()->id;

        $assignment->save();
    }
}
