<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService{

    public function getAllProducts()
    {
        return ProductResource::collection(Product::with('author')->get());
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
    }

    public function search($query)
    {
        $porducts = null;
        if(is_null($query)){
           $porducts = ProductResource::collection(Product::with('author')->get());
        }
        else{
            $porducts =  Product::with('author')
        ->whereHas('author', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })
        ->Orwhere('name', 'LIKE', "%$query%")
        ->OrWhere('created_at','LIKE', "%$query%")
        ->latest()->get();
        }
        
        return ProductResource::collection($porducts);
    }
}