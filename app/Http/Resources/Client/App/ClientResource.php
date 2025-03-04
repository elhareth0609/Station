<?php

namespace App\Http\Resources\Client\App;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'photo' => $this->photoUrl
        ];
    }
}
