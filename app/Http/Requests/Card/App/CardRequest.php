<?php

namespace App\Http\Requests\Card\App;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
        ];
    }
}