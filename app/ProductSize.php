<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * char(100) name
 * char(100) measurement
 */
class ProductSize extends Model
{
    protected $fillable = ['name', 'measurement'];
}
