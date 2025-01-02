<?php

namespace App\Services;

use App\Interfaces\CarRepositoryInterface;
use App\Http\Requests\Car\App\CarRequest;

class CarService {
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository) {
        $this->carRepository = $carRepository;
    }

    public function getCar($id) {
        return $this->carRepository->find($id);
    }

    public function createCar(array $data) {
        return $this->carRepository->create($data);
    }

    public function updateCar($id, array $data) {
        return $this->carRepository->update($id, $data);
    }

    public function deleteCar($id) {
        return $this->carRepository->delete($id);
    }
}
