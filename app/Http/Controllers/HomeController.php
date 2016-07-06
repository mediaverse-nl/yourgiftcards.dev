<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Orderdetail;
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
        $this->middleware('auth');
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

        return view('welcome')
            ->with('category', $this->category)
            ->with('product', $product);
    }
}
