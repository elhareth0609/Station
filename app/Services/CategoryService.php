<?php

namespace App\Services;

use App\Interfaces\CategoryRepositoryInterface;

class CategoryService {
    private $categoryRepository;


    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategory($id) {
        return $this->categoryRepository->find($id);
    }

    public function allCategory() {
        return $this->categoryRepository->all();
    }

    public function activedCategory() {
        return $this->categoryRepository->actived();    
    }

    public function createCategory(array $data) {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, array $data) {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory($id) {
        return $this->categoryRepository->delete($id);
    }
}
