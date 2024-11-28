<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Location;
use Illuminate\Http\Request;

class MapController extends Controller {
    public function index() {
        $cars = Car::with(['locations'])->get();
        return view('content.logistics.index')
        ->with('cars', $cars);
    }


    public function getLatestLocations() {
        $locations = Location::with('car')->latest()->get();
        return response()->json($locations);
    }
}
