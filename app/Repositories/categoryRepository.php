<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function find($id) {
        return $this->category->findOrFail($id);
    }

    public function all() {
        return $this->category->all();
    }

    public function create(array $data) {
        return $this->category->create($data);
    }

    public function update($id, array $data) {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }

    public function actived() {
        return $this->category->where('status', 'active')->get();
    }
}
