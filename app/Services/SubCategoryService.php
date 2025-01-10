<?php

namespace App\Services;

use App\Interfaces\SubCategoryRepositoryInterface;

class SubCategoryService {
    private $subCategoryRepository;

    public function __construct(SubCategoryRepositoryInterface $subCategoryRepository) {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function getSubCategory($id) {
        return $this->subCategoryRepository->find($id);
    }

    public function createSubCategory(array $data) {
        return $this->subCategoryRepository->create($data);
    }

    public function updateSubCategory($id, array $data) {
        return $this->subCategoryRepository->update($id, $data);
    }

    public function deleteSubCategory($id) {
        return $this->subCategoryRepository->delete($id);
    }
}
