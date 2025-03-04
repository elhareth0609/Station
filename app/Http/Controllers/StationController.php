<?php

namespace App\Http\Controllers;

use App\Http\Requests\Station\App\StationRequest;
use App\Http\Resources\Station\App\StationResource;
use App\Services\StationService;
use App\Traits\ApiResponder;

class StationController extends Controller {
    use ApiResponder;

    private $stationService;

    public function __construct(StationService $stationService) {
        $this->stationService = $stationService;
    }

    public function get($id) {
        try {
            $car = $this->stationService->getStation($id);
            return $this->success(new StationResource($car));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(StationRequest $request) {
        try {
            $car = $this->stationService->createStation($request->validated());
            return $this->success(new StationResource($car), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(StationRequest $request, $id) {
        try {
            $car = $this->stationService->updateStation($id, $request->validated());
            return $this->success(new StationResource($car), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->stationService->deleteStation($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
