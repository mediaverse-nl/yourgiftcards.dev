<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Productkey;
use App\Product;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->product = new Product;
        $this->category = new Category;
        $this->stock = Productkey::with('product')->orderBy('product_id')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index')
            ->with('products', $this->product->all())
            ->with('stock', $this->stock);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create')
            ->with('companies', $this->category->lists('name', 'id'));
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
            'name.required'        => 'geef een product naam op',
        ];

        $rules = [
            'name'           => 'required|max:40',
            'value'          => 'required|numeric',
            'category_id'    => 'required|numeric',
            'price'          => array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'discount'       => array('regex:/^\d*(\.\d{2})?$/'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.product.create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->product->category_id     =  $request->category_id;
        $this->product->price           =  $request->price;
        $this->product->discount        =  $request->discount;
        $this->product->value           =  $request->value;
        $this->product->name            =  $request->name;

        $this->product->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit')
            ->with('product', $this->product->find($id))
            ->with('companies', $this->category->lists('name', 'id'));
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
            'name.required'        => 'geef een product naam op',
        ];

        $rules = [
            'name'          => 'required|max:40',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.product.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->product->find($id);

        $product->name =  $request->name;

        $product->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.product.edit', $id);
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

        $product->delete();

        \Session::flash('succes_message','successfully deleted.');

        return Redirect()->route('admin.product');
    }
}
