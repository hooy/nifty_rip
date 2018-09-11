<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource as ProductResource;
use App\Http\Resources\ProductResourceCollection as ProductResourceCollection;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductResourceCollection(Product::all());
    }

    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

}
