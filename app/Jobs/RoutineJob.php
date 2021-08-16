<?php

namespace App\Jobs;

use App\Api\V1\Repositories\Eloquent\CronRepository;
use App\Contracts\Services\IBuyTicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineJob extends Job
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
    public function handle(IBuyTicketService $buyTicketService)
    {

        $res = $buyTicketService->buyTicket('3b319664cf784102a96249cf1fc55892', 29, 1);
        var_dump($res->getContent());
    }
}
