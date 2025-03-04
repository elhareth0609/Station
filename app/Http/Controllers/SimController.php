<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sim\App\SimRequest;
use App\Http\Resources\Sim\App\SimResource;
use App\Services\SimService;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class SimController extends Controller {
    use ApiResponder;

    private $simService;

    public function __construct(SimService $simService) {
        $this->simService = $simService;
    }

    public function get($id) {
        try {
            $car = $this->simService->getSim($id);
            return $this->success(new SimResource($car));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(SimRequest $request) {
        try {
            $car = $this->simService->createSim($request->validated());
            return $this->success(new SimResource($car), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(SimRequest $request, $id) {
        try {
            $car = $this->simService->updateSim($id, $request->validated());
            return $this->success(new SimResource($car), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->simService->deleteSim($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}
