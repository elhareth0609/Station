<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface {
    private $transaction;

    public function __construct(Transaction $transaction) {
        $this->transaction = $transaction;
    }

    public function find($id) {
        return $this->transaction->findOrFail($id);
    }

    public function create(array $data) {
        return $this->transaction->create($data);
    }

    public function update($id, array $data) {
        $transaction = $this->find($id);
        $transaction->update($data);
        return $transaction;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }
}
