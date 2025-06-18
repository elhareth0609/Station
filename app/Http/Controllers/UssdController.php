<?php

namespace App\Http\Controllers;

use App\Services\UssdService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UssdController extends Controller
{
    protected $ussdService;

    public function __construct(UssdService $ussdService)
    {
        $this->ussdService = $ussdService;
    }

    /**
     * Endpoint for Postman/clients to create a top-up request.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'station_code' => 'required|string|exists:stations,code',
            'phone_number' => 'required|string|min:10',
            'amount' => 'required|numeric|min:50',
            'provider' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()], 422);
        }

        try {
            $ussd = $this->ussdService->createUssdTransaction($validator->validated());
            return response()->json([
                'message' => 'Transaction sent to station.',
                'data' => [
                    'ussd_id' => $ussd->id,
                    'status' => $ussd->status,
                ],
            ], 202); // 202 Accepted
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Endpoint for the Node.js agent to update the status.
     */
    public function updateStatus(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            'status' => 'required|in:completed,rejected',
            'response_message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            $this->ussdService->updateUssdStatus($id, $validator->validated());
            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
