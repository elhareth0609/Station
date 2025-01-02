<?php

namespace App\Repositories;

use App\Models\Car;
use App\Interfaces\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface {
    private $model;

    public function __construct(Car $car) {
        $this->model = $car;
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update($id, array $data) {
        $car = $this->find($id);
        $car->update($data);
        return $car;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }
}
