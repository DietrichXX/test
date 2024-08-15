<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected object $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->getAll();
        return response()->json([
            'products' => $products,
            'message' => 'All products get successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): JsonResponse
    {
        $product = $this->productService->store($request->validated());
        return response()->json([
            'product' => $product,
            'message' => 'Product store successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, int $id): JsonResponse
    {
        $product = $this->productService->update($request->validated(), $id);
        return response()->json([
            'product' => $product,
            'message' => 'Product update successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        if($this->productService->delete($id)){
            return response()->json(['message' => 'Product delete successfully']);
        }else{
            return response()->json(['message' => 'Product delete unsuccessfully']);
        }
    }
}
