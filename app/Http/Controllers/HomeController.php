<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Orderdetail;
use App\OrderedProduct;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->category = new Category();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('status', 'on')->take(4)->get();

        $bestOrdered = OrderedProduct::leftJoin('productkey', 'ordered_product.productkey_id', '=', 'productkey.id')
            ->selectRaw('productkey.product_id,  count(productkey.product_id) as SoldItems')
            ->groupBy('productkey.product_id')
            ->orderBy('SoldItems', 'desc')
            ->take(4)
            ->get();

        $array = [];
        foreach ($bestOrdered as $prod){
            $array[] = Product::find($prod->product_id);
        }

        return view('welcome')
            ->with('category', $this->category->get())
            ->with('product', $array  ? $array : $product);
    }
}
