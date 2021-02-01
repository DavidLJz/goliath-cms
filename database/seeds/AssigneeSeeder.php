<?php

use Illuminate\Database\Seeder;
use App\Models\assignment;
use App\Models\assignee;

class AssigneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignee = new assignee;

        $assignee->assignment_id = assignment::first()->id;

        $assignee->save();
    }
}
