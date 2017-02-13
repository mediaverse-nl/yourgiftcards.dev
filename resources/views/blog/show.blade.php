{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', $blog->title.' | '.trans('seo.product.online_giftcards').' | '.env('APP_URL'))
@section('description', $blog->text)
@section('keywords', $blog .', '. trans('seo.product.keywords'))

@push('mate-tags')
    <meta property=”og:title” content="{{$blog->title}}"/>
    <meta property=”og:image” content="http://justgiftcards.nl/img/blog/{{$blog->image}}"/>
    <meta property=”og:url” content="{{Request::url()}}"/>
    <meta property=”og:description” content="{{$blog->text}}"/>
    <meta property="og:site_name" content="Justgiftcards.nl" />

    <meta name=”twitter:card” content=”summary”>
    <meta name=”twitter:url” content="{{Request::url()}}">
    <meta name=”twitter:title” content="{{$blog->title}}">
    <meta name=”twitter:description” content="{{$blog->text}}">
    <meta name=”twitter:image” content="http://justgiftcards.nl/img/blog/{{$blog->image}}">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('blog.post', $blog) !!}

        <div class="col-lg-9">
            <img class="image img-responsive" src="/img/blog/{{$blog->image}}" alt="">
            <h1>{{$blog->title}}</h1>
            <p>{{$blog->text}}</p>
            <small class="text-muted">posted: {{$blog->updated_at}}</small><br>
            <small class="text-muted">posted: {{$blog->created_at}}</small>
        </div>

    </div>


@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
