<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Resources\OrderResource as OrderResource;
use App\Http\Resources\OrderResourceCollection as OrderResourceCollection;

class OrderController extends Controller
{
    public function index()
    {
        return new OrderResourceCollection(Order::all());
    }

    public function show($id)
    {
        return new ProductResource(Order::find($id));
    }
}
