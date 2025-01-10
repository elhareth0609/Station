<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProductService;
use App\Http\Requests\Product\App\ProductRequest;
use App\Http\Resources\Product\App\ProductResource;
use App\Traits\ApiResponder;

class ProductController extends Controller {
    use ApiResponder;

    private $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function get($id) {
        try {
            $product = $this->productService->getProduct($id);
            return $this->success(new ProductResource($product));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function create(ProductRequest $request) {
        try {
            $product = $this->productService->createProduct($request->validated());
            return $this->success(new ProductResource($product), __('Created Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(ProductRequest $request, $id) {
        try {
            $product = $this->productService->updateProduct($id, $request->validated());
            return $this->success(new ProductResource($product), __('Updated Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->productService->deleteProduct($id);
            return $this->success(null, __('Deleted Successfully.'));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}
