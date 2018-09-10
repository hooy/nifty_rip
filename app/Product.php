<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

/**
  * price
  * product_type_id
  * product_color_id
  * product_size_id
*/

class Product extends Model
{
    protected $fillable = ['price'];

    public function color() {
       return $this->belongsTo('App\ProductColor');
    }

    public function size() {
       return $this->belongsTo('App\ProductSize');
    }

    public function type() {
       return $this->belongsTo('App\ProductType');
    }

    public function currency() {
       return $this->belongsTo('App\Currency');
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

}
