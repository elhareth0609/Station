<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FullCalendarController extends Controller {
    public function index() {
        return view('content.fuLlcalendar.index');
    }
}
