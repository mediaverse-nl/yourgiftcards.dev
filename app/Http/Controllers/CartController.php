<?php

namespace App\Http\Controllers;


use App\Product;

use Cart;
use Session;
use Redirect;
use Validator;
use Mollie;

use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    public function __construct()
    {
        $this->product =  new Product;
        $this->mollie = Mollie::api();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();

        return view('cart', ['cart' => $cart]);
    }

    public function add(Request $request)
    {
        $rules = [
            'product_id' => 'required',
            'qty' => 'required'
        ];

        $validator = Validator::make(Request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->product->find(Request()->get('product_id'));

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty ? $request->qty : 1,
            'options' => [$product],
            'price' => ($product->price + $product->servicecosts) - $product->discount
        ]);

        return redirect()->route('cart.index');
    }

    public function remove(){
        Cart::remove(Request()->get('row'));
        return redirect()->route('cart.index');
    }

    public function decrease()
    {
        Cart::update(Request()->get('row'), Request()->get('qty'));
        return redirect()->route('cart.index');
    }

    public function increase()
    {
        Cart::update(Request()->get('row'), Request()->get('qty'));
        return redirect()->route('cart.index');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout')->with('cart', Cart::content());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'levering' => 'required',
            'payment_method' => 'required',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('cart.checkout')
                ->withErrors($validator)
                ->withInput();
        }

        $array = [];
        foreach (Cart::content() as $item){
            $property = $this->product->where('serialNumber', $item->id)->first();
            $array[] = [
                'property_id' => $property->id,
                'order_id' => $order->id,
                'selling_price' => $item->price,
                'amount' => $item['qty']
            ];
        }

        OrderItem::insert($array);

        Cart::destroy();
    }
}
