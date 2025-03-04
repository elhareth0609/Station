<?php

namespace App\Http\Resources\Station\App;

use Illuminate\Http\Resources\Json\JsonResource;

class StationResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'user_id' => $this->user_id,
            'status' => $this->status
        ];
    }
}
