{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title')
    Yourgiftcards - nieuws
@endsection

{{--meta tag description--}}
@section('description')
    volg ons voor het nieuws over je favoriete platform
@endsection

{{--meta tag keywords--}}
@section('keywords')
    nieuws
@endsection

{{--meta tag meta tags--}}
@section('mate-tags')

    <meta property="og:title" content="Stuffed Cookies" />
    <meta property="og:image" content="http://fbwerks.com:8000/zhen/cookie.jpg" />
    <meta property="og:description" content="The Turducken of Cookies" />
    <meta property="og:url" content="http://fbwerks.com:8000/zhen/cookie.html">

@endsection

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('blog') !!}

        @foreach($blogs as $blog)

            <div class="col-lg-6">
                <a href="{{route('blog.show', str_replace(' ', '-', $blog->title))}}">
                    <img style="width: 100%; height: 330px;" src="/img/blog/{{$blog->image}}">
                </a>
                <h1 class="">{{$blog->title}}</h1>
                <p class="">{{$blog->text}}</p>
                <span>{{$blog->created_at}}</span>
            </div>
            
        @endforeach

    </div>

    <hr>

    {!! $blogs->render() !!}



@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
