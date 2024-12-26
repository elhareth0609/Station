<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinymceController extends Controller {
    public function index() {
        return view('content.tinymce.index');
    }

    public function store(Request $request) {
        try {
            return response()->json([
                'icon' => 'success',
                'state' => __("Success"),
                'message' => __("Updated Successfully.")
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'icon' => 'error',
                'state' => __("Error"),
                'message' => __($e->getMessage())
            ]);
        }
    }
}
