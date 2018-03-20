<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded = [];

    protected function product()
    {
        return $this->hasMany(Product::class , 'product_category_id');
    }
}
