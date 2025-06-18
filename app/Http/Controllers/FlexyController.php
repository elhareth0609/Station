<?php
namespace App\Http\Controllers;

use App\Models\Ussd;
use Illuminate\Http\Request;

class FlexyController extends Controller
{
    public function index()
    {
        // Fetch the last 50 transactions for the history table
        $transactions = Ussd::with('sim.station')
                              ->latest()
                              ->take(50)
                              ->get();

        return view('content.dashboard.flexy.index', compact('transactions'));
    }
}
