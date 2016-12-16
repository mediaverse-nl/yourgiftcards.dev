<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Productkey;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->category = Category::all();
        $this->stock = Productkey::with('product')->orderBy('product_id')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories')->with('category', $this->category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $categoryItem = $this->category->where('name', str_replace('-', ' ', $category))->first();
//        dd(str_replace(' ', '-', $category));
        $specialProduct = Product::where('category_id', $categoryItem->id)->orderBy('discount', 'desc')->first();

        return view('category')
            ->with('category', $categoryItem)
            ->with('stock', $this->stock)
            ->with('tip', $specialProduct);
    }

}
