<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckTenggat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-tenggat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    $this->info(app('App\Http\Controllers\ScheduleController')->checkTenggat());
    }
}
