<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CurrenciesSeeder::class);
        $this->call(ProductColorsSeeder::class);
        $this->call(ProductSizesSeeder::class);
        $this->call(ProductTypesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(OrdersSeeder::class);
    }
}
