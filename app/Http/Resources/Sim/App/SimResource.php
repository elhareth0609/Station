<?php

namespace App\Http\Resources\Sim\App;

use Illuminate\Http\Resources\Json\JsonResource;

class SimResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'station_id' => $this->station_id,
            'phone' => $this->phone,
            'imei' => $this->imei,
            'ip' => $this->ip,
            'status' => $this->status
        ];
    }
}
