<?php

namespace App\Http\Controllers;

use App\Cart;

use App\Order;
use App\Orderdetail;

use Session;
use Validator;
use Mollie;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->oldCart = Session::has('cart') ? Session::get('cart') : null;
        $this->order = new Order;
        $this->orderdetail = new Orderdetail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fullname.required'        => 'geef een categorie naam op',
        ];

        $rules = [
            'fullname'          => 'required|max:40',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
//                ->route('cart.checkout', 1)
                ->withErrors($validator)
                ->withInput();
        }

        $this->order->fullname   =  $request->fullname;
        $this->order->email      =  $request->email;
        $this->order->method    =  $request->methods;
        $this->order->method    =  'open';

        $payment = Mollie::api()->payments()->create([
            "amount"      => 10.00,
            "description" => "My first API payment",
//            "redirectUrl" => URL::route('cart.payment', 1),
        ]);

//        $payment = Mollie::api()->payments()->get($payment->id);

//        if ($payment->isPaid())
//        {
//            echo "Payment received.";
//        }

        $this->order->save();

        \Session::flash('succes_message','successfully.');


//        return redirect()->route('cart.checkout', 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment_id = 'tr_WDqYK6vllg';
//        $payment    = Mollie::api()->payments()->get($payment->id);

        /*
         * The order ID saved in the payment can be used to load the order and update it's
         * status
         */
//        $order_id = $payment->metadata->order_id;
//
//        if ($payment->isPaid())
//        {
//            /*
//             * At this point you'd probably want to start the process of delivering the product
//             * to the customer.
//             */
//        }
//        elseif (! $payment->isOpen())
//        {
//            /*
//             * The payment isn't paid and isn't open anymore. We can assume it was aborted.
//             */
//
//            return 'not paid';
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
