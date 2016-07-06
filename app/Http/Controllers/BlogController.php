<?php

namespace App\Http\Controllers;

use App\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{

    public $blog;

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
        return view('blog.index')->with('blogs', $this->blog->where('status', 'live')->paginate(4));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        return view('blog.show')->with('blog', $this->blog->where('title', str_replace('-', ' ', $title))->first());
    }

}
