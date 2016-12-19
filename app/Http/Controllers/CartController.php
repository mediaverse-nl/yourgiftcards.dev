<?php

namespace App\Http\Controllers;

use App\Product;

use App\Productkey;
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
        ];

        $validator = Validator::make(Request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->product->find(Request()->get('product_id'));

        $stock = Productkey::where('product_id', $product->id)->count();

        if($request->qty){
            if($stock >= $request->qty){
                $max = $request->qty;
            }else{
                $max = $stock;
            }
        }else{
            $max = 1;
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $max,
            'options' => [$product],
            'price' => ($product->price + $product->servicecosts) - $product->discount
        ]);

        return redirect()->route('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Cart::count() == 0)
            return redirect()->route('cart.index');

        return view('checkout')
            ->with('cart', Cart::content())
            ->with('mollie', $this->mollie->methods()->all());
    }

    public function remove()
    {
        Cart::remove(Request()->get('row'));

        return redirect()->route('cart.index');
    }

    public function decrease(Request $request)
    {
        $search = Cart::update($request->row, 1);
        $stock = Productkey::where('product_id', $search->id)->count();
        Cart::update(Request()->get('row'), $stock > Request()->get('qty') ? Request()->get('qty') : $stock);

        return redirect()->route('cart.index');
    }

    public function increase(Request $request)
    {
        $search = Cart::update($request->row, 1);
        $stock = Productkey::where('product_id', $search->id)->count();
        Cart::update(Request()->get('row'), $stock > Request()->get('qty') ? Request()->get('qty') : $stock);

        return redirect()->route('cart.index');
    }

    public function destroy()
    {
        Cart::destroy();

        return redirect()->route('cart.index');
    }
}
