<?php

namespace App\Http\Resources\SubCategory\App;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'status' => $this->status
        ];
    }
}
