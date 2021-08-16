<?php

namespace App\Console;

use App\Api\V1\Repositories\Eloquent\CronRepository;
use App\Jobs\ExampleJob;
use App\Jobs\RoutineJob;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Application;
use Illuminate\Contracts\Foundation\Application as FoundationApplication;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // public $cronRepo;

    // public function __construct(CronRepository $cronRepo)
    // {
    //     $this->cronRepo = $cronRepo;
    // }
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
        $schedule->job(new RoutineJob)->everyMinute();
    }
}
