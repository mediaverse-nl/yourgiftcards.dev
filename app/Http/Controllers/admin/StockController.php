<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use App\Productkey;

use Auth;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function __construct()
    {
        $this->product = new Product;
        $this->productkey = new Productkey;
        $this->category = new Category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stock.index')->with('stock', $this->productkey->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stock.create')->with('companies', $this->product->lists('name', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'key.required'        => 'key van het product',
        ];

        $rules = [
            'key'          => 'required|max:40',
            'product_id'          => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.stock.create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->productkey->product_id     =  $request->product_id;
        $this->productkey->key            =  $request->key;
        $this->productkey->user_id        =  Auth::user()->id;

        $this->productkey->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.stock');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.stock.edit')
            ->with('stock', $this->productkey->find($id))
            ->with('companies', $this->product->lists('name', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'key.required'        => 'geef een product naam op',
        ];

        $rules = [
            'key'          => 'required|max:40',
            'product_id'          => 'required|max:40',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.stock.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $productkey = $this->productkey->find($id);

        $productkey->key           =  $request->key;
        $productkey->product_id    =  $request->product_id;
        $productkey->copy          =  $request->copy;

        $productkey->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.stock.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);

        $product->destroy();

        \Session::flash('succes_message','successfully deleted.');

        return Redirect()->route('items.index');
    }
}