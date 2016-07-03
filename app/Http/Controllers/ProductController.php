<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $name)
    {
        $cate = $this->category->where('name', str_replace('-', ' ', $category))->first();
        $product = $this->product->where('name', str_replace('-', ' ', $name))->first();

        return view('product')
            ->with('category', $cate)
            ->with('product', $product);
    }

}
