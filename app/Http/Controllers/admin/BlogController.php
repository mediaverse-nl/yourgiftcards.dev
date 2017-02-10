<?php

namespace App\Http\Controllers\admin;

use App\Blog;

use Auth;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $blog;
    
    public function __construct()
    {
        $this->blog = new Blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index')->with('blogs', $this->blog->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'title.required'        => 'geef een categorie naam op',
            'image.mimes'      => 'file type must be (JPEG, PNG, JNG or BMP) ',

        ];

        $rules = [
            'title' => 'required|unique:blog|max:40',
            'image'     => 'required|mimes:jpeg,png,jng,bmp',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.blog.create')
                ->withErrors($validator)
                ->withInput();
        }

        $destinationPath = public_path().'/img';

        $minetype = $request->file('image')->getClientOriginalExtension();
        $full_path = str_random(15).'.'.$minetype;
        $request->file('image')->move( $destinationPath.'/blog', $full_path);

        $this->blog->user_id =  Auth::user()->id;
        $this->blog->title =  $request->title;
        $this->blog->text =  $request->text;
        $this->blog->image =  $full_path;
        $this->blog->status =  $request->status;;

        $this->blog->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.blog');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.blog.edit')->with('blog', $this->blog->findOrFail($id));
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
            'title.required'   => 'geef een unique title op',
            'image.mimes'      => 'file type must be (JPEG, PNG, JNG or BMP) ',
        ];

        $rules = [
            'title'     => 'required|max:40',
            'image'     => 'mimes:jpeg,png,jng,bmp',
            'text'      => 'required',
            'status'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.blog.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $blog = $this->blog->findOrFail($id);

        $blog->user_id =  Auth::user()->id;
        $blog->title =  $request->title;
        $blog->text =  $request->text;
        $blog->status =  $request->status;

        if($request->hasFile('image')){
            $destinationPath = public_path().'/img';
            $minetype = $request->file('image')->getClientOriginalExtension();
            $full_path = str_random(15).'.'.$minetype;
            $request->file('image')->move( $destinationPath.'/blog', $full_path);
            $blog->image =  $full_path;
        }

        $blog->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.blog.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->blog->findOrFail($id);

        $blog->status = 'deleted';

        $blog->save();

        \Session::flash('succes_message','successfully deleted.');

        return Redirect()->route('admin.blog');
    }
}
