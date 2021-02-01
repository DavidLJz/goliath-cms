<?php

use Illuminate\Database\Seeder;
use App\Models\subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = new subject;

        $subject->name = 'Matematicas';
        $subject->description = 'Esta es la materia de maticas';

        $subject->save();
    }
}
