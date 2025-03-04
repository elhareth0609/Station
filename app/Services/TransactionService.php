<?php

namespace App\Services;

use App\Interfaces\TransactionRepositoryInterface;

class TransactionService {
    private $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository) {
        $this->transactionRepository = $transactionRepository;
    }

    public function getTransaction($id) {
        return $this->transactionRepository->find($id);
    }

    public function createTransaction(array $data) {
        return $this->transactionRepository->create($data);
    }

    public function updateTransaction($id, array $data) {
        return $this->transactionRepository->update($id, $data);
    }

    public function deleteTransaction($id) {
        return $this->transactionRepository->delete($id);
    }
}
