<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use App\Http\Requests\Category\App\CategoryRequest;
use App\Http\Resources\Category\App\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller {
    use ApiResponder;

    private $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function get($id) {
        try {
            $category = $this->categoryService->getCategory($id);
            return $this->success(new CategoryResource($category));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(CategoryRequest $request) {
        try {
            $category = $this->categoryService->createCategory($request->validated());
            return $this->success(new CategoryResource($category), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(CategoryRequest $request, $id) {
        try {
            $category = $this->categoryService->updateCategory($id, $request->validated());
            return $this->success(new CategoryResource($category), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->categoryService->deleteCategory($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}
