<?php

namespace App\Jobs;

use App\Api\V1\Repositories\Eloquent\CronRepository;

class ExampleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CronRepository $cronRepo)
    {
        //
        $cronRepo->create(['val' => "from a job"]);
    }
}
