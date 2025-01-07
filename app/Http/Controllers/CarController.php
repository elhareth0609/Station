<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Http\Requests\Car\App\CarRequest;
use App\Http\Resources\Car\App\CarResource;
use App\Traits\ApiResponder;

class CarController extends Controller {
    use ApiResponder;

    private $carService;

    public function __construct(CarService $carService) {
        $this->carService = $carService;
    }

    public function get($id) {
        try {
            $car = $this->carService->getCar($id);
            return $this->success(new CarResource($car));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(CarRequest $request) {
        try {
            $car = $this->carService->createCar($request->validated());
            return $this->success(new CarResource($car), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(CarRequest $request, $id) {
        try {
            $car = $this->carService->updateCar($id, $request->validated());
            return $this->success(new CarResource($car), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->carService->deleteCar($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
