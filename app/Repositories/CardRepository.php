<?php

namespace App\Repositories;

use App\Interfaces\CardRepositoryInterface;
use App\Models\Card;

class CardRepository implements CardRepositoryInterface {
    private $Card;

    public function __construct(Card $Card) {
        $this->Card = $Card;
    }

    public function find($id) {
        return $this->Card->findOrFail($id);
    }

    public function create(array $data) {
        return $this->Card->create($data);
    }

    public function update($id, array $data) {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }

    public function all() {
        return $this->Card->all();
    }

    public function actived() {
        return $this->Card->where('status', 'active')->get();
    }
}