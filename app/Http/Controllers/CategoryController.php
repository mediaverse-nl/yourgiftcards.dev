<?php

namespace App\Http\Controllers;

use App\Category;
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
        return view('category')
            ->with('category', $this->category->where('name', str_replace(' ', '-', $category))->first())
            ->with('stock', $this->stock);
    }

}
