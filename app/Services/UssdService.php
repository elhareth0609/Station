<?php

namespace App\Services;

use App\Models\Sim;
use App\Models\Station;
use App\Models\Ussd;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UssdService
{
    /**
     * Create a USSD transaction and send it to the gateway.
     */
    public function createUssdTransaction(array $data): Ussd
    {
        // 1. Find the station
        $station = Station::where('code', $data['station_code'])
            ->where('status', 'active')
            ->firstOrFail();

        // 2. Find an available SIM on that station with the correct provider name
        $sim = $station->sims()
            ->where('name', 'like', '%' . $data['provider'] . '%')
            ->where('status', 'active')
            ->firstOrFail();

        // 3. Build the specific USSD code based on the provider AND the SIM's PIN
        // The PIN is now retrieved directly from the Sim model
        $ussdCode = $this->buildUssdCode(
            $data['provider'],
            $data['phone_number'],
            $data['amount'],
            $sim->pin_code // <-- CHANGED: Pass the pin_code to the builder function
        );

        if (empty($ussdCode)) {
            // This will now be caught by the exception inside buildUssdCode
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
                'sim_ip' => $sim->ip,
            ],
        ]);

        return $ussd;
    }

    /**
     * Updates the status of a USSD transaction from the Node agent.
     */
    public function updateUssdStatus(int $id, array $data): Ussd
    {
        // ... (This method remains unchanged)
        $ussd = Ussd::findOrFail($id);
        $ussd->update([
            'status' => $data['status'],
            'response_message' => $data['response_message'],
        ]);
        return $ussd;
    }

    /**
     * Pushes a command to a station via the Node.js Gateway.
     */
    private function sendCommandToGateway(string $stationCode, array $payload): void
    {
        // ... (This method remains unchanged)
        $gatewayUrl = env('GATEWAY_URL_HTTP') . '/send-command';
        $secretKey = 'your-very-strong-and-secret-key';
        try {
            Http::withHeaders(['X-Secret-Key' => $secretKey])
                ->timeout(5)
                ->post($gatewayUrl, ['stationCode' => $stationCode, 'payload' => $payload]);
        } catch (\Exception $e) {
            Log::error('Could not connect to the Modem Gateway server.', ['message' => $e->getMessage()]);
            throw new \Exception('The gateway is currently offline. Please try again later.');
        }
    }

    /**
     * Builds the provider-specific USSD code.
     *
     * @param string $provider The mobile provider (e.g., 'djezzy')
     * @param string $phone The target phone number for the top-up
     * @param float $amount The top-up amount
     * @param string|null $pinCode The secret PIN from the agent's SIM card
     * @return string The formatted USSD code
     * @throws \Exception If the PIN is required but not provided
     */
    private function buildUssdCode(string $provider, string $phone, float $amount, ?string $pinCode): string
    {
        // --- MODIFIED: This entire function is updated ---
        $provider = strtolower($provider);

        // A PIN is required for all new formats.
        if (empty($pinCode)) {
            throw new \Exception('A SIM PIN is required for this provider but was not found.');
        }

        // The amount might need to be an integer for the USSD code
        $amountInt = (int)$amount;

        switch ($provider) {
            case 'djezzy':
                // Format: *760*n°*amount*code#
                return "*760*{$phone}*{$amountInt}*{$pinCode}#";

            case 'ooredoo':
                // Format: *630*n°*m*amount*code#
                // Assuming 'm' is also the amount, which is a common pattern.
                return "*630*{$phone}*{$amountInt}*{$amountInt}*{$pinCode}#";

            case 'mobilis':
                // Format: *696*1*n°*m*amount*code#
                // Assuming 'm' is also the amount.
                return "*696*1*{$phone}*{$amountInt}*{$amountInt}*{$pinCode}#";

            default:
                return ''; // Return empty for unsupported providers
        }
    }
}
