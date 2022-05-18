<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;


class ProductController extends Controller
{
    
    public $productService;
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }


    public function index()
    {
        return $this->productService->getAllProducts();
        
    }

    public function store()
    {
        $this->productService->store();
    }

    public function search(Request $request)
    {
        return $this->productService->search($request->search);
    }

}
