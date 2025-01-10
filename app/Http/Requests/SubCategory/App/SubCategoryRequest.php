<?php

namespace App\Http\Requests\SubCategory\App;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'category_id' => 'required|string|exists:categories,id',
            'status' => 'required|in:active,inactive',
            'id' => $this->isMethod('PUT') ? 'required|exists:sub_categories' : '',
        ];
    }
}
