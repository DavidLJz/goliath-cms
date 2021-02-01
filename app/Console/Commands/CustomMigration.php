<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrar:custom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'custom migration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       /** Specify the names of the migrations files in the order you want to 
        * loaded
        * $migrations =[ 
        *               'xxxx_xx_xx_000000_create_nameTable_table.php',
        *    ];
        */
        $migrations = [ 
            '2021_02_01_025851_create_subjects_table.php',
            '2021_01_28_025930_create_assignments_table.php',
            '2021_01_28_032310_create_assignees_table.php',
            '2021_01_28_033912_create_assignment_requirements_table.php',
        ];

        if (empty($migrations)) {
            echo 'No migrations to run';
            return;
        }

        $basePath = 'database/migrations/';

        foreach($migrations as $migration) {      
           $migrationName = trim($migration);

           $path = $basePath.$migrationName;

           // to do: check file exists

           $this->call('migrate', ['--path' => $path]);
        }
    }
}
