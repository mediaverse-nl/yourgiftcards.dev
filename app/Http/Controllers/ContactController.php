<?php

namespace App\Http\Controllers;

use Validator;
use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{

    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required|max:40',
            'email'           => 'required|email|max:60',
            'message'           => 'required|max:250',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('klantenservice')
                ->withErrors($validator)
                ->withInput();
        }

        Mail::send('mail.contact', ['name' => $request->name, 'email' => $request->email, 'message' => $request->message], function ($m) use ($request) {
            $m->from('contact@justgiftcards.nl', 'Justgiftcards - Info');
            $m->to($request->email, $request->name)->subject('Contact');
        });

        \Session::flash('succes_message', trans('text.successfully'));

        return redirect()->route('klantenservice');
    }
}
