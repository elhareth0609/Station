<?php

namespace App\Http\Requests\Category\App;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'id' => $this->isMethod('PUT') ? 'required|exists:cars' : '',
        ];
    }
}
