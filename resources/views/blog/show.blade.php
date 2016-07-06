{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title')
    nieuws
@endsection

{{--meta tag description--}}
@section('description')
    nieuws
@endsection

{{--meta tag keywords--}}
@section('keywords')
    nieuws
@endsection

{{--meta tag keywords--}}
@section('mate-tags')

    <meta property="og:title" content="Stuffed Cookies" />
    <meta property="og:image" content="http://fbwerks.com:8000/zhen/cookie.jpg" />
    <meta property="og:description" content="The Turducken of Cookies" />
    <meta property="og:url" content="http://fbwerks.com:8000/zhen/cookie.html">

@endsection

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('blog.post', $blog) !!}


        <div class="col-lg-8">
            <img class="image" src="/img/blog/{{$blog->image}}" alt="">
            <h1>{{$blog->title}}</h1>
            <p>{{$blog->text}}</p>
            <p>{{$blog->created_at}}</p>
        </div>

    </div>


@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
