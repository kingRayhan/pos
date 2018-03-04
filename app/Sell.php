<?php

namespace App;

use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
   protected $guarded = [];

   function product()
   {
       return $this->belongsTo('App\Product');
   }

   function buyer()
   {
       return $this->belongsTo(Customer::class , 'customer_id');
   }
}
