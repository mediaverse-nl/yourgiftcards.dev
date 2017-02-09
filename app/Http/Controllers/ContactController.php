<?php

namespace App\Http\Controllers;

use Validator;

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

        Mail::send('mail.contact', ['name' => $name, 'email' => $email, 'message' => $message], function ($m) use ($name, $email, $message) {
            $m->from('contact@justgiftcards.nl', 'Justgiftcards');

            $m->to($email, $name)->subject('Contact');
        });

        \Session::flash('succes_message', trans('text.successfully'));

        return redirect()->route('klantenservice');
    }
}
