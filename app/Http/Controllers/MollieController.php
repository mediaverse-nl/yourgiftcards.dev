<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;

use Validator;
use Cart;
use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_OPEN = 'open';
    const STATUS_COMPLETED = 'paid';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    protected $mollie;
    protected $order;
    protected $property;

    public function __construct()
    {
        $this->mollie = Mollie::api();
        $this->order = new Order();
        $this->property = new Product();
    }

    public function create(Request $request)
    {
        $rules = [
            'fullname' => 'required',
            'email' => 'required|email',
//            'voorwaarden' => 'required',
            'methods' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $neworder = $this->order;

        $neworder->status = self::STATUS_OPEN;
        $neworder->total = Cart::subtotal();
        $neworder->method = $request->methods;
        $neworder->fullname = $request->fullname;
        $neworder->email = $request->email;

        $neworder->save();

        $payment =  $this->mollie->payments()->create([
            "amount"      => Cart::subtotal(),
            "description" => "Order Nr. ". $neworder->id,
            "redirectUrl" => route('order.get', $neworder->id),
            'metadata'    => array(
                'order_id' => $neworder->id,
            ),
            "method" => $neworder->method,
//            "issuer" => $order->payment_method == 'ideal' ? $request->issuer_id : '',
        ]);

        $order = $this->order->find($neworder->id);

        $order->payment_id = $payment->id;
        $order->status = self::STATUS_PENDING;

        $order->save();

//        Mail::send('emails.bedankt', ['order' => $order], function($m) use ($order){
////            $m->from('another@email.com', 'My name');
//            $m->to($order->email, $order->name)->subject('Bedankt voor uw bestelling!');
//        });

        return redirect($payment->getPaymentUrl());
    }

    public function get($id)
    {
        $order = $this->order->find($id);

        $payment =  $this->mollie->payments()->get($order->payment_id);

        if ($payment->isPaid())
        {
//            if ($order->status != 'paid'){
//                foreach($order->orderItems as $product){
//                    $new_stock = (int)$product->property->stock - $product->amount;
//                    $this->property->where('id', $product->property_id)
//                        ->update(array('stock' => $new_stock));
//                }
//            }
            $order->status = self::STATUS_COMPLETED;
//            Mail::send('emails.payment', ['payment' => $order], function($m) use ($order){
////                $m->from('info@esigareteindhoven.com');
//                $m->to($order->email, $order->name)->subject('Betaalbevestiging!');
//            });
        }
        elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
        }

        $order->save();

        return view('order')->with('order', $order)->with('payment', $payment);
    }

}