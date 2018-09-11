<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Order::class, 20)->create();
        $products = App\Product::all();

        App\Order::all()->each(function ($order) use ($products) {
            $order->products()->attach(
                $products->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
