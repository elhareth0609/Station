<?php

namespace App\Services;

use App\Models\Sim;
use App\Models\Station;
use App\Models\Ussd;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UssdService {
    /**
     * Create a USSD transaction and send it to the gateway.
     */
    public function createUssdTransaction(array $data): Ussd
    {
        // 1. Find the station by its unique code
        $station = Station::where('code', $data['station_code'])
            ->where('status', 'active')
            ->firstOrFail();

        // 2. Find an available SIM on that station with the correct provider name
        // The SIM 'name' field should hold the provider name e.g., "Djezzy", "Ooredoo"
        $sim = $station->sims()
            ->where('name', 'like', '%' . $data['provider'] . '%')
            ->where('status', 'active')
            ->firstOrFail();

        // 3. Build the specific USSD code based on the provider
        $ussdCode = $this->buildUssdCode($data['provider'], $data['phone_number'], $data['amount']);
        if (empty($ussdCode)) {
            throw new \Exception('Provider not supported or invalid top-up format.');
        }

        // 4. Create the USSD record in the database
        $ussd = Ussd::create([
            'sim_id' => $sim->id,
            'ussd_code' => $ussdCode,
            'client_phone' => $data['phone_number'],
            'amount' => $data['amount'],
            'status' => 'in progress',
        ]);

        // 5. Prepare and send the command to the Node.js Gateway
        $this->sendCommandToGateway($station->code, [
            'event' => 'execute_ussd',
            'data' => [
                'ussd_id' => $ussd->id,
                'ussd_code' => $ussd->ussd_code,
                'sim_ip' => $sim->ip, // Tell the agent which modem (IP) to use
            ],
        ]);

        return $ussd;
    }

    /**
     * Updates the status of a USSD transaction from the Node agent.
     */
    public function updateUssdStatus(int $id, array $data): Ussd
    {
        $ussd = Ussd::findOrFail($id);
        $ussd->update([
            'status' => $data['status'], // 'completed' or 'rejected'
            'response_message' => $data['response_message'],
        ]);
        return $ussd;
    }

    /**
     * Pushes a command to a station via the Node.js Gateway.
     */
    private function sendCommandToGateway(string $stationCode, array $payload): void {
        $gatewayUrl = 'http://127.0.0.1:8081/send-command';
        $secretKey = 'your-very-strong-and-secret-key';

        try {
            Http::withHeaders(['X-Secret-Key' => $secretKey])
                ->timeout(5) // Don't wait forever
                ->post($gatewayUrl, [
                    'stationCode' => $stationCode,
                    'payload' => $payload,
                ]);
        } catch (\Exception $e) {
            Log::error('Could not connect to the Modem Gateway server.', ['message' => $e->getMessage()]);
            // Optionally, fail the Ussd record immediately
            // Ussd::where('status', 'in progress')->update(['status' => 'rejected', 'response_message' => 'Gateway offline']);
            throw new \Exception('The gateway is currently offline. Please try again later.');
        }
    }

    private function buildUssdCode(string $provider, string $phone, float $amount): string
    {
        // Example for Algerian providers
        $provider = strtolower($provider);
        if ($provider === 'djezzy') {
            return "*710#"; // Add PIN if required
            // return "*770*{$phone}*{$amount}#"; // Add PIN if required
            // return "*770*{$phone}*{$amount}*YOUR_AGENT_PIN#"; // Add PIN if required
        }
        if ($provider === 'ooredoo') {
            return "*113*{$phone}*{$amount}#";
        }
        if ($provider === 'mobilis') {
            return "*610*{$phone}*{$amount}#";
        }
        return '';
    }
}
