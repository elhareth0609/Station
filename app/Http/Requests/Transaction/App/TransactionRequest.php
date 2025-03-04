<?php

namespace App\Http\Requests\Transaction\App;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
            'id' => $this->isMethod('PUT') ? 'required|exists:sub_categories' : '',
        ];
    }
}
