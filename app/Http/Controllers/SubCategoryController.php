<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SubCategoryService;
use App\Http\Requests\SubCategory\App\SubCategoryRequest;
use App\Http\Resources\SubCategory\App\SubCategoryResource;
use App\Traits\ApiResponder;


class SubCategoryController extends Controller {
    use ApiResponder;

    private $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService) {
        $this->subCategoryService = $subCategoryService;
    }

    public function get($id) {
        try {
            $subCategory = $this->subCategoryService->getSubCategory($id);
            return $this->success(new SubCategoryResource($subCategory));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(SubCategoryRequest $request) {
        try {
            $subCategory = $this->subCategoryService->createSubCategory($request->validated());
            return $this->success(new SubCategoryResource($subCategory), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(SubCategoryRequest $request, $id) {
        try {
            $subCategory = $this->subCategoryService->updateSubCategory($id, $request->validated());
            return $this->success(new SubCategoryResource($subCategory), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->subCategoryService->deleteSubCategory($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
