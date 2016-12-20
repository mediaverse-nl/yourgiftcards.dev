<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Category;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->category = new Category;
//        $this->category = $this->category->where('status', 'on')->get();
//        $this->product = Product::with('companies', $this->category->lists('name', 'status'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')->with('categories', $this->category->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name.required'        => 'geef een categorie naam op',
            'image.required'       => 'main foto',
            'thumbnail.mimes'      => 'file type must be (JPEG, PNG, JNG or BMP) ',
            'layout.mimes'      => 'file type must be (JPEG, PNG, JNG or BMP) ',
            'icon.mimes'      => 'file type must be (JPEG, PNG, JNG, ICO or BMP) ',
        ];

        $rules = [
            'name'          => 'required|max:40',
            'thumbnail'     => 'required|mimes:jpeg,png,jng,bmp',
            'layout'     => 'required|mimes:jpeg,png,jng,bmp',
            'icon'     => 'required|mimes:jpeg,png,jng,bmp,ico',
            'description'     => 'required|max:250',
            'levering'     => 'required|max:250',
            'instructions'     => 'required|max:250',
            'status'     => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.category.create')
                ->withErrors($validator)
                ->withInput();
        }

        $destinationPath = public_path().'\img';

        $minetype1 = $request->file('thumbnail')->getClientOriginalExtension();
        $full_path_1 = str_random(20).'.'.$minetype1;
        $request->file('thumbnail')->move($destinationPath.'\thumbnail', $full_path_1);

        $minetype2 = $request->file('layout')->getClientOriginalExtension();
        $full_path_2 = str_random(20).'.'.$minetype2;
        $request->file('layout')->move($destinationPath.'\cardlayout', $full_path_2);

        $minetype3 = $request->file('icon')->getClientOriginalExtension();
        $full_path_3 = str_random(20).'.'.$minetype3;
        $request->file('icon')->move($destinationPath.'\icon', $full_path_3);

        $this->category->thumbnail =  $full_path_1;
        $this->category->layout =  $full_path_2;
        $this->category->icon =  $full_path_3;
        $this->category->name =  $request->name;
        $this->category->description =  $request->description;
        $this->category->levering =  $request->levering;
        $this->category->instructions =  $request->instructions;
        $this->category->status =  $request->status;

        $this->category->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit')->with('category', $this->category->find($id));
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
            'name.required'        => 'geef een categorie naam op',
            'thumbnail.mimes'      => 'file type must be (JPEG, PNG, JNG or BMP) ',
            'layout.mimes'      => 'file type must be (JPEG, PNG, JNG or BMP) ',
            'icon.mimes'      => 'file type must be (JPEG, PNG, JNG, ICO or BMP) ',
        ];

        $rules = [
            'name'          => 'required|max:40',
            'thumbnail'     => 'mimes:jpeg,png,jng,bmp',
            'layout'     => 'mimes:jpeg,png,jng,bmp',
            'icon'     => 'mimes:jpeg,png,jng,bmp,ico',
            'description'     => 'required|max:250',
            'levering'     => 'required|max:250',
            'instructions'     => 'required|max:250',
            'status'     => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.category.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $destinationPath = public_path().'/img';

        $category = $this->category->find($id);

        $category->name =  $request->name;
        $category->description =  $request->description;
        $category->levering =  $request->levering;
        $category->instructions =  $request->instructions;
        $category->status =  $request->status;

        if($request->hasFile('thumbnail')){
            $minetype1 = $request->file('thumbnail')->getClientOriginalExtension();
            $full_path_1 = str_random(20).'.'.$minetype1;
            $request->file('thumbnail')->move($destinationPath.'/thumbnail', $full_path_1);
            $category->thumbnail = $full_path_1;
        }

        if($request->hasFile('layout')){
            $minetype2 = $request->file('layout')->getClientOriginalExtension();
            $full_path_2 = str_random(20).'.'.$minetype2;
            $request->file('layout')->move($destinationPath.'/cardlayout', $full_path_2);
            $category->layout =  $full_path_2;
        }

        if($request->hasFile('icon')){
            $minetype3 = $request->file('icon')->getClientOriginalExtension();
            $full_path_3 = str_random(20).'.'.$minetype3;
            $request->file('icon')->move($destinationPath.'/icon', $full_path_3);
            $category->icon =  $full_path_3;
        }

        $category->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin.category.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        \Session::flash('succes_message','successfully deleted.');

        return Redirect()->route('admin.category');
    }
}
