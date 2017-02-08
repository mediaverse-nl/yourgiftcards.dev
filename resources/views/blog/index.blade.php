{{--default layout from site--}}
@extends('layouts.default')

@section('title', trans('seo.blog.page_title'))
@section('description', trans('seo.blog.page_description'))
@section('keywords', trans('seo.blog.keywords'))

@push('mate-tags')

@endpush

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

@stop