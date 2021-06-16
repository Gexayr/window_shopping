<?php

namespace App\Repositories;

use App\Models\Product;
use mysql_xdevapi\Collection;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function all()
    {
        return $this->product->all();
    }

    public function find($id): ?Product
    {
        return $this->product->find($id);
    }
    
    public function inCart(array $inCart)
    {
        return $this->product->whereIn('id', $inCart)->get();
    }
}
