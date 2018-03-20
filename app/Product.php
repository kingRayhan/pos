<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected function category()
    {
        return $this->belongsTo(ProductCategory::class , 'product_category_id');
    }
}
