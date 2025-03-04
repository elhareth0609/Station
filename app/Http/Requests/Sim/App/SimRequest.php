<?php

namespace App\Http\Requests\Sim\App;

use Illuminate\Foundation\Http\FormRequest;

class SimRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
            'id' => $this->isMethod('PUT') ? 'required|exists:cars' : '',
        ];
    }
}
