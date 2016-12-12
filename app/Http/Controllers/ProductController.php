<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Productkey;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->stock = Productkey::with('product')->orderBy('product_id')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $name)
    {
        $product = $this->product->where('name', str_replace('-', ' ', $name))->first();

        return view('product')
            ->with('category', $product->category)
            ->with('product', $product)
            ->with('stock', $this->stock);
    }

}
