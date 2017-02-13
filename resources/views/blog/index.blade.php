{{--default layout from site--}}
@extends('layouts.default')

@section('title', trans('seo.blog.page_title'))
@section('description', trans('seo.blog.page_description'))
@section('keywords', trans('seo.blog.keywords'))

@push('mate-tags')
    <meta name="robots" content="index,follow">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('blog') !!}

        @foreach($blogs as $blog)
            <div class="col-lg-6">
                <a href="{{route('blog.show', str_replace(' ', '-', $blog->title))}}">
                    <img style="width: 100%; height: 330px; z-index: 999 !important;" src="/img/blog/{{$blog->image}}">
                </a>
                <span class="badge" style="margin-top: 10px; float: right; z-index: 111 !important;">{{$blog->created_at}}</span>

                <h1 class="">{{$blog->title}}</h1>
                <p class="">{{str_limit($blog->text, 100, '...')}}</p>
            </div>
        @endforeach

    </div>

    <hr>

    {!! $blogs->render() !!}

@stop