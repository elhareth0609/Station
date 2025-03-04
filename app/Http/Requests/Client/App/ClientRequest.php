<?php

namespace App\Http\Requests\Client\App;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
            'id' => $this->isMethod('PUT') ? 'required|exists:cars' : '',
        ];
    }
}
