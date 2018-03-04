<?php

namespace App;

use App\Sell;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    protected function buy()
    {
        return $this->hasMany(Sell::class);
    }

    public function totalSpend()
    {
        $spend = 0;
        foreach( $this->buy as $buy )
        {
            $spend += ($buy->sell_price * $buy->quantity);
        }
        return $spend;
    }
}
