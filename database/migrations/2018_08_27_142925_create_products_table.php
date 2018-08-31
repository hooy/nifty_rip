<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * at this point lets have simple model, with straightforward
     * implementation of price and currency fields;
     * in future good to have smart model with some helper functions
     * to achieve multi-currency fields with rates, history etc.
     * or at least have separate model for "money" field and add
     * more features later
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('price', 12, 2);

            $table->foreign('currency_id')
                  ->references('id')
                  ->on('currencies')
                  ->onDelete('restrict');

            $table->foreign('product_type_id')
                  ->references('id')
                  ->on('product_types')
                  ->onDelete('restrict');

            $table->foreign('product_color_id')
                  ->references('id')
                  ->on('product_colors')
                  ->onDelete('restrict');

            $table->foreign('product_size_id')
                  ->references('id')
                  ->on('product_sizes')
                  ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
