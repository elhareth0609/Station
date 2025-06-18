<?php

namespace App\Services;

use App\Interfaces\SimRepositoryInterface;
use App\Models\Sim;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SimService {
    private $simRepository;


    public function __construct(SimRepositoryInterface $simRepository) {
        $this->simRepository = $simRepository;
    }

    public function getSim($id) {
        return $this->simRepository->find($id);
    }

    // public function allSim() {
    //     return $this->simRepository->all();
    // }

    // public function activedSim() {
    //     return $this->simRepository->actived();
    // }

    public function createSim(array $data) {
        return $this->simRepository->create($data);
    }

    public function updateSim($id, array $data) {
        return $this->simRepository->update($id, $data);
    }

    public function deleteSim($id) {
        return $this->simRepository->delete($id);
    }

    public function bulkUpdateStatus(string $stationCode, array $statuses) {
        foreach ($statuses as $status) {
            $sim = Sim::whereHas('station', function ($query) use ($stationCode) {
                $query->where('code', $stationCode);
            })->where('ip', $status['ip'])->first();

            if ($sim) {
                $sim->update([
                    'rat'               => $status['Rat'],
                    'provider_name'     => $status['providerName'],
                    'connection_status' => $status['connectionStatus'],
                    'network_type'      => $status['networkType'],
                    'signal_strength'   => $status['signalBars'],
                    'unread_messages'   => $status['unreadMessages'],
                    'last_seen_at'      => now(),
                ]);
                // Prepare event for broadcasting
                $this->sendCommandToGateway('broadcast_all', [
                    'event' => 'sim.status.updated',
                    'data' => $sim->toArray()
                ]);
            }
        }
    }

    public function changeIpAddress(Sim $sim, string $newIp)
    {
        $stationCode = $sim->station->code;
        $currentIp = $sim->ip;

        $this->sendCommandToGateway($stationCode, [
            'event' => 'change_ip',
            'data' => [
                'target_ip' => $currentIp,
                'new_ip' => $newIp,
                'sim_id' => $sim->id, // Send sim_id for confirmation
            ],
        ]);
    }

    public function confirmIpChange(int $simId, string $newIp)
    {
        $sim = Sim::find($simId);
        if ($sim) {
            $sim->update(['ip' => $newIp]);
            // You can broadcast another event here to confirm the change on the dashboard
        }
    }

    private function sendCommandToGateway(string $stationCode, array $payload): void
    {
        $gatewayUrl = env('GATEWAY_URL_HTTP') . '/send-command';
        $secretKey = 'your-very-strong-and-secret-key';
        try {
            Http::withHeaders(['X-Secret-Key' => $secretKey])
                ->timeout(5)
                ->post($gatewayUrl, [
                    'stationCode' => $stationCode, // Use 'broadcast_all' to send to all clients
                    'payload' => $payload,
                ]);
        } catch (\Exception $e) {
            Log::error('Could not connect to the Modem Gateway server.', ['message' => $e->getMessage()]);
        }
    }

}
