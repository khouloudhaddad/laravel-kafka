<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response($products, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->only('name', 'stock'));
        ProductCreated::dispatch($product->toArray())->onQueue('default');
        return response($product, Response::HTTP_CREATED);
    }
}
