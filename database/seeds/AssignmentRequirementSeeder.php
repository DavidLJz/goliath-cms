<?php

use Illuminate\Database\Seeder;
use App\Models\assignment;
use App\Models\assignment_requirement;

class AssignmentRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requirement = new assignment_requirement;

        $requirement->name = 'Entregar en limpio';
        $requirement->description = 'Sin rallones';
        $requirement->assignment_id = assignment::first()->id;

        $requirement->save();
    }
}
