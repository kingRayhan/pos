<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'customer_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'number' => $this->number,
            'address' => $this->address,
            'shopping_spend' => $this->totalSpend(),
            'note' => $this->note
        ];
    }
}
