<?php

namespace App\Http\Requests\User\App;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
            'id' => $this->isMethod('PUT') ? 'required|exists:products' : '',
        ];
    }
}
