<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $fillable = ['name', 'hex'];

    public function products()
    {
        return $this->hasMany('App\Product', 'product_id');
    }
}
