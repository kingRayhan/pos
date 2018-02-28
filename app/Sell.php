<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
   protected $guarded = [];

   function product()
   {
       return $this->belongsTo('App\Product');
   }
}
