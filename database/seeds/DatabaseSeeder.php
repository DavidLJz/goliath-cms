<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentGroupSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(AssignmentSeeder::class);
        $this->call(AssigneeSeeder::class);
        $this->call(AssignmentRequirementSeeder::class);
    }
}
