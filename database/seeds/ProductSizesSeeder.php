<?php

use Illuminate\Database\Seeder;

class ProductSizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductSize::class, 4)->create();
    }
}
