<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use App\Productkey;

use Auth;

use Validator;

use Carbon\Carbon;

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
        return view('admin.stock.index')
            ->with('stock', $this->productkey->orderBy('productkey.status', 'asc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stock.create')
            ->with('companies', $this->product->lists('name', 'id'));
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
        $this->productkey->region         =  $request->region;
        $this->productkey->cardnumber     =  $request->cardnumber;
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
        $rules = [
            'key'          => 'required|max:60|unique:productkey,key,'.$id,
            'product_id'          => 'required|max:40',
            'region'          => 'required|max:3',
            'cardnumber'          => 'required|max:100|unique:productkey,cardnumber,'.$id,
        ];

        $validator = Validator::make($request->all(), $rules);

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
        $productkey->region         =  $request->region;
        $productkey->cardnumber     =  $request->cardnumber;

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

//    public function updateStock()
//    {
//        $products = $this->productkey->where('status', 'pending')->get();
//
//        foreach ($products as $product)
//        {
//            $startTime = Carbon::parse($product->updated_at);
//            $finishTime = Carbon::now();
//            $totalDuration = $finishTime->diffInSeconds($startTime);
//
//            if($totalDuration > 900)
//            {
//                //als deze tijd groter is dan 15 min moet de instatie geupdate worden.
////                dd([gmdate('H:i:s', $totalDuration), $totalDuration]);
//                $this->productkey->where('id', $product->id)
//                    ->where('status', '=', 'pending')
//                    ->update(['status' => 'sell']);
//
//            }
//        }
//
////        return $products;
//    }

}
