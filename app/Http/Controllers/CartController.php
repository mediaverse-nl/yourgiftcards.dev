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

        foreach ($cart as $item){
            $stock = Productkey::where('product_id', $item->id)->where('status', 'sell')->count();
            Cart::update($item->rowId, $stock > $item->qty ? $item->qty : $stock);
        }

        return view('cart', ['cart' => $cart])->with('mollie', $this->mollie->methods()->all());
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

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => Request()->get('qty') ? Request()->get('qty') : 1,
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

        $array = [];
        foreach ( Cart::content() as $item){
            $array[] = $item->options[0]->servicecosts * $item->qty ;
        }

        return view('checkout')
            ->with('cart', Cart::content())
            ->with('servicecosts', array_sum($array))
            ->with('mollie', $this->mollie->methods()->all());
    }

    public function remove()
    {
        Cart::remove(Request()->get('row'));
        return redirect()->route('cart.index');
    }

    public function decrease(Request $request)
    {
        Cart::update(Request()->get('row'), Request()->get('qty') ? Request()->get('qty') : 1);
        return redirect()->route('cart.index');
    }

    public function increase(Request $request)
    {
        Cart::update(Request()->get('row'), Request()->get('qty') ? Request()->get('qty') : 1);
        return redirect()->route('cart.index');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart.index');
    }
}
