<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use App\Product;
use App\ProductType;
use App\ProductColor;
use App\ProductSize;
use App\Currency;
use App\Http\Resources\ProductResource as ProductResource;
use App\Http\Resources\ProductResourceCollection as ProductResourceCollection;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductResourceCollection(Product::paginate());
    }

    public function show($id)
    {
        $product = Product::findOrfail($id);
        return new ProductResource($product);
    }


    public function store(Request $request)
    {
        // TODO:
        // * add proper validation class
        // * properly check all inputs for existing values in DB


        $input = $request->all();
        try {
            $product = Product::create([
                'name' => $input['name'],
                'slug' => $input['slug'],
                'price' => $input['price'],
                'product_type_id' => ProductType::where('name', '=', $input['type'])->first()->id,
                'product_color_id' => ProductColor::where('name', '=', $input['color'])->first()->id,
                'product_size_id' => ProductSize::where('name', '=', $input['size'])->first()->id,
                'currency_id' => Currency::where('iso_code', '=', $input['currency'])->first()->id,
            ]);

            return new ProductResource($product);

        } catch (QueryException $e) {
            return response()->json([
                'status'      => 'failed',
                'status_code' => 400,
                'massage'     => $e->getTrace(),
            ], 400);
        }
    }

}
