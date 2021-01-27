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
            '2021_01_27_054603_create_tasks_table.php',
            '2021_01_27_055611_create_task_roles_table.php',
            '2021_01_27_055153_create_task_members_table.php',
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
