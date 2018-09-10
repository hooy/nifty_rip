<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * char(200) name
 * char(100) slug
 */
class ProductType extends Model
{
    protected $fillable = ['name', 'slug'];
}
