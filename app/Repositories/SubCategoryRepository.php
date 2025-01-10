<?php

namespace App\Repositories;

use App\Interfaces\SubCategoryRepositoryInterface;
use App\Models\SubCategory;

class SubCategoryRepository implements SubCategoryRepositoryInterface {
    private $subCategory;

    public function __construct(SubCategory $subCategory) {
        $this->subCategory = $subCategory;
    }

    public function find($id) {
        return $this->subCategory->findOrFail($id);
    }

    public function create(array $data) {
        return $this->subCategory->create($data);
    }

    public function update($id, array $data) {
        $subCategory = $this->find($id);
        $subCategory->update($data);
        return $subCategory;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }
}
