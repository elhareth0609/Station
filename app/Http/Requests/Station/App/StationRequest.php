<?php

namespace App\Http\Requests\Station\App;

use Illuminate\Foundation\Http\FormRequest;

class StationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => $this->isMethod('PUT') ? 'required|exists:cars' : '',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'required|in:active,inactive',
        ];
    }
}
