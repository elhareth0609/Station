<?php

namespace App\Http\Resources\Card\App;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status
        ];
    }
}