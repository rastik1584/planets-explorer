<?php

namespace App\Console\Commands;

use App\Http\Controllers\PlanetsController;
use Illuminate\Console\Command;

class PlanetsSyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'planets:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronization planets';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Running sync from planets');
        PlanetsController::planetsSync();
        $this->info('Sync is done');
        return 0;
    }
}
