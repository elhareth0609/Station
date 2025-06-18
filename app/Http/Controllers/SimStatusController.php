<?php
namespace App\Http\Controllers;

use App\Models\Station;
use App\Services\SimService;
use Illuminate\Http\Request;

class SimStatusController extends Controller
{
    protected $simService;

    public function __construct(SimService $simService)
    {
        $this->simService = $simService;
    }

    public function bulkUpdate(Request $request)
    {
        $this->simService->bulkUpdateStatus(
            $request->input('station_code'),
            $request->input('statuses', [])
        );
        return response()->json(['message' => 'Statuses received.']);
    }

    public function changeIp(Request $request, \App\Models\Sim $sim)
    {
        $request->validate(['new_ip' => 'required|ip']);
        $this->simService->changeIpAddress($sim, $request->new_ip);
        return response()->json(['message' => 'IP change command sent to station.']);
    }

    public function confirmIpChange(Request $request)
    {
        $request->validate(['sim_id' => 'required|exists:sims,id', 'new_ip' => 'required|ip']);
        $this->simService->confirmIpChange($request->sim_id, $request->new_ip);
        return response()->json(['message' => 'IP address confirmed and updated.']);
    }

    public function getSimsForStation(string $stationCode)
{
    $station = Station::where('code', $stationCode)->firstOrFail();
    $sims = $station->sims()->where('status', 'active')->get();
    return response()->json(['data' => $sims]);
}

}
