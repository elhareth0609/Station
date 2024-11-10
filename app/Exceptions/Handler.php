<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler {

    public function report(Throwable $exception) {
        parent::report($exception);
    }


    public function render($request, Throwable $exception) {
        return parent::render($request, $exception);
    }

}
