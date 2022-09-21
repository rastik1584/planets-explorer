<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ProjectInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project install cmd';

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
        if(env('DB_NAME') == "laravel") {
            $this->info('Set ENV DB_NAME');
            return Command::FAILURE;
        }
        $this->info('Project is installing...');
        $this->info('Run migrations');
        Artisan::call('migrate');
        $this->info('Run npm install');
        exec('npm i');

        $this->info('Project is successfully installed');
        return Command::SUCCESS;
    }
}
