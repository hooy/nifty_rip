<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Before running this seed, be sure you run
     * other seeds, because every product instance is tightly coupled
     * with other business instances, like currency or ProductColor
     * @return void
     */
    public function run()
    {
        # get seeded
        $currencies = App\Currency::all('id')->pluck('id')->toArray();
        $product_types = App\ProductType::all('id')->pluck('id')->toArray();
        $product_colors = App\ProductColor::all('id')->pluck('id')->toArray();
        $product_sizes = App\ProductSize::all('id')->pluck('id')->toArray();

        # lets have Cartesian set of products
        foreach ($product_types as $type) {
            foreach ($product_colors as $color) {
                foreach ($product_sizes as $size) {
                    factory(App\Product::class)->create([
                        'currency_id' => $currencies[array_rand($currencies)],
                        'product_type_id' => $type,
                        'product_color_id' => $color,
                        'product_size_id' => $size,
                    ]);
                }
            }
        }


    }
}
