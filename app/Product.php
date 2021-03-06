<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
  * price
  * product_type_id
  * product_color_id
  * product_size_id
*/

class Product extends Model
{
    protected $fillable = [
        'price',
        'name',
        'slug',
        'product_type_id',
        'product_color_id',
        'product_size_id',
        'currency_id',
    ];

    public function color() {
       return $this->belongsTo('App\ProductColor', 'product_color_id');
    }

    public function size() {
       return $this->belongsTo('App\ProductSize', 'product_size_id');
    }

    public function type() {
       return $this->belongsTo('App\ProductType', 'product_type_id');
    }

    public function currency() {
       return $this->belongsTo('App\Currency', 'currency_id');
    }

    public function orders() {
        return $this->belongsToMany('App\Order')->withTimestamps();;
    }

}
