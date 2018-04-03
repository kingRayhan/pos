<?php

namespace App\Http\Controllers;

use App\Sell;
use App\Product;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = Sell::all();
        return view('sells.index' , compact('sells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sells.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        //
    }


    public function sellProduct(Request $request)
    {
        $products = json_decode($request->getContent() , true);
        $customer_id = $products['customer_id'];
        foreach( $products['bags'] as $product )
        {
            Sell::create([
                'product_id' => $product['product_id'],
                'sell_price' => $product['sell_price'],
                'quantity' => $product['quantity'],
                'customer_id' => NULL
            ]);
            $stock = Product::find($product['product_id']);
            $stock->update([
                'stock' => $stock->stock - $product['quantity']
            ]);
        }
    }
}
