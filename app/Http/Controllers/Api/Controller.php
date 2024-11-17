<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ExceptionJsonResponse;
use Exception;

class Controller
{
    protected function errorHandler(string $messege, Exception $erro){
            throw new ExceptionJsonResponse(
                message:$message,
                previous: $error,
                code: $statusCode,
            );
    }
}
