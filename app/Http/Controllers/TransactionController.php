<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\App\TransactionRequest;
use App\Http\Resources\Transaction\App\TransactionResource;
use App\Services\TransactionService;
use App\Traits\ApiResponder;

class TransactionController extends Controller {
    use ApiResponder;

    private $transactionService;

    public function __construct(TransactionService $transactionService) {
        $this->transactionService = $transactionService;
    }

    public function get($id) {
        try {
            $car = $this->transactionService->getTransaction($id);
            return $this->success(new TransactionResource($car));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(TransactionRequest $request) {
        try {
            $car = $this->transactionService->createTransaction($request->validated());
            return $this->success(new TransactionResource($car), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(TransactionRequest $request, $id) {
        try {
            $car = $this->transactionService->updateTransaction($id, $request->validated());
            return $this->success(new TransactionResource($car), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->transactionService->deleteTransaction($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}
