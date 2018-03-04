<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'sell_id' => $this->id,
            'product_name' => $this->product->name,
            'quantity' => $this->quantity,
            'sell_unit_price' => $this->sell_price,
            'buy_unit_price' => $this->product->buy_price,
            'total_buy_price' => $this->product->buy_price * $this->quantity,
            'total_sell_price' => $this->quantity * $this->sell_price,
            'net_profit' => ($this->quantity * $this->sell_price) - ($this->product->buy_price * $this->quantity),
            'buyer' => $this->buyer,
            'date' => $this->created_at->format('d/m/Y'),
            'time' => $this->created_at->format('g:i:s a')
        ];
    }
}
