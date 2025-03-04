<?php

namespace App\Http\Resources\Transaction\App;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status
        ];
    }
}
