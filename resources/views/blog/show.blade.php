{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', $product->name.' | '.trans('seo.product.online_giftcards').' | '.env('APP_URL'))
@section('description', $category->description)
@section('keywords', $product->category->name .', '. trans('seo.product.keywords'))

@push('mate-tags')
    <meta property=”og:title” content="{{$product->name}}"/>
    <meta property=”og:image” content="/img/thumbnail/{{$product->category->thumbnail}}"/>
    <meta property=”og:url” content="{{Request::url()}}"/>
    <meta property=”og:description” content="{{$category->description}}"/>
    <meta property="og:site_name" content="Justgiftcards.nl" />

    <meta name=”twitter:card” content=”summary”>
    <meta name=”twitter:url” content="{{Request::url()}}">
    <meta name=”twitter:title” content="{{$product->name}}">
    <meta name=”twitter:description” content="{{$category->description}}">
    <meta name=”twitter:image” content="/img/thumbnail/{{$product->category->thumbnail}}">
@endpush

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
