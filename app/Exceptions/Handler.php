<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler {

    public function report(Throwable $exception) {
        dd('Exception caught!'); // Just for testing to ensure the method is called

        parent::report($exception);
    }


    public function render($request, Throwable $exception) {
        dd('Exception caught!'); // Just for testing to ensure the method is called
        return parent::render($request, $exception);
    }

    }
