<?php

namespace App\Http\Resources\Car\App;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
