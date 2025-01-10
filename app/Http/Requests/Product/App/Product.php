<?php

namespace App\Http\Requests\Product\App;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
            'price' => 'required',
            'image' => 'required',
            'id' => $this->isMethod('PUT') ? 'required|exists:products' : '',
        ];
    }
}
