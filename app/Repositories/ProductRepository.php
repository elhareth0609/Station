<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {
    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function find($id) {
        return $this->product->findOrFail($id);
    }

    public function create(array $data) {
        return $this->product->create($data);
    }

    public function update($id, array $data) {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }
}
