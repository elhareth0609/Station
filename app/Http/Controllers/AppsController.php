<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppsController extends Controller {
    public function tinymce() {
        return view('content.apps.tinymce');
    }

    public function select() {
        return view('content.apps.select');
    }
    
    public function tag() {
        return view('content.apps.tag');
    }

    public function wizard() {
        return view('content.apps.wizard');
    }

    public function tinymce_store(Request $request) {
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
