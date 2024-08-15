<?php

namespace App\Services;

use App\Interfaces\ProductInterface;
use App\Models\Products\Product;
use Illuminate\Support\Collection;

class ProductService
{
    protected object $product;

    public function __construct(ProductInterface $product){
        $this->product = $product;
    }

    public function getAll(): Collection
    {
        return $this->product::all();
    }

    public function store(array $data): Product
    {
        return $this->product::create($data);
    }

    public function update(array $data, int $id): Product
    {
        $product = $this->product::findOrFail($id);
        return tap($product)->update($data);
    }

    public function delete(int $id): bool
    {
        $product = $this->product::findOrFail($id);
        return $product->delete();
    }
}
