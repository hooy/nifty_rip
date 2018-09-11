<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number', 'user_id'];

    /**
     * Get the products inside order
     */
    public function user()
    {
        return  $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();;
    }
}
