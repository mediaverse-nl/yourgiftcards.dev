<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Productkey;

use Mollie\Laravel\Facades\Mollie;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    protected $mollie;

    public function __construct()
    {
        $this->mollie = Mollie::api();
        $this->category = new Category;
        $this->stock = Productkey::with('product')->where('region', \App::getLocale())->orderBy('product_id')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories')
            ->with('category', $this->category->get());
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
        $specialProduct = Product::where('category_id', $categoryItem->id)->orderBy('discount', 'desc')->first();

        return view('category')
            ->with('category', $categoryItem)
            ->with('stock', $this->stock)
            ->with('tip', $specialProduct)
            ->with('mollie', $this->mollie->methods()->all());
    }

}
