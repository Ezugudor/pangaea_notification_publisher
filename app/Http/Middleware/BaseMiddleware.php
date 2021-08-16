<?php

namespace App\Http\Middleware;

use Dingo\Api\Routing\Helpers;
use App\Api\V1\Traits\HttpStatusResponse as TraitsHttpStatusResponse;

class BaseMiddleware
{
    // Interface help call
    use Helpers, TraitsHttpStatusResponse;
}
