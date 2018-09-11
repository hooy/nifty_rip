<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Order;
use App\Product;
use App\ProductType;
use App\Http\Resources\OrderResource as OrderResource;
use App\Http\Resources\OrderResourceCollection as OrderResourceCollection;

class OrderController extends Controller
{
    public function index()
    {
        return new OrderResourceCollection(Order::paginate());
    }

    public function show($id)
    {
        return new OrderResource(Order::find($id));
    }

    public function by_type($type)
    {
        $type = ProductType::where('name', '=', $type)->first()->id;
        $orders = Order::whereHas('products', function($q) use($type) {
            $q->where('product_type_id', '=', $type);
        })->get();
        return new OrderResourceCollection($orders);
    }

    public function store(Request $request)
    {
        // TODO:
        // * add proper validation class
        // * properly check all inputs for existing values in DB
        $input = $request->all();
        try {
            $order = Order::create([
                'order_number' => (string) Str::uuid(),

                # don't have much time for that now
                # need properly verify user (also create some JWT tokens etc.)
                'user_id' => 1,
            ]);
            $order->save();
            $products = Product::findMany($input['products']);
            $order->products()->attach($products);

            return new OrderResource($order);

        } catch (QueryException $e) {
            return response()->json([
                'status'      => 'failed',
                'status_code' => 400,
                'massage'     => $e->getTrace(),
            ], 400);
        }
    }
}
