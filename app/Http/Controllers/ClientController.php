<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\App\ClientRequest;
use App\Http\Resources\Client\App\ClientResource;
use App\Services\ClientService;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class ClientController extends Controller {
    use ApiResponder;

    private $clientService;

    public function __construct(ClientService $clientService) {
        $this->clientService = $clientService;
    }

    public function all() {
        try {
            $allClients = $this->clientService->allClients();
            return $this->success(ClientResource::collection($allClients));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get($id) {
        try {
            $car = $this->clientService->getClient($id);
            return $this->success(new ClientResource($car));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(ClientRequest $request) {
        try {
            $car = $this->clientService->createClient($request->validated());
            return $this->success(new ClientResource($car), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(ClientRequest $request, $id) {
        try {
            $car = $this->clientService->updateClient($id, $request->validated());
            return $this->success(new ClientResource($car), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->clientService->deleteClient($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}
