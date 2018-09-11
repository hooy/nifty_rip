<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany('App\Product', 'product_id');
    }
}
