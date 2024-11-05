<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LogController extends Controller {
    public function get($id) {
        // $log = Log::find($id);
        return view('content.logs.index');
        // ->with('logs', $log);
    }

    public function delete($id) {
        try{
            $log = Log::find($id);
            $log->delete();

        return response()->json([
            'icon' => 'success',
            'state' => __("Success"),
            'message' => __("Log Deleted successfully")
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
            'icon' => 'error',
            'state' => __("Error"),
            'message' => $e->getMessage()
            ]);
        }
    }
}
