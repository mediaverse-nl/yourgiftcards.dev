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

        <div class="col-lg-3">
            <div class="thumbnail container-shadow " style="height: auto; border: 1px dashed #ddd;">
                <a  href="{{route('giftcard.show',[str_replace(' ', '-', $blog->category->product->first()->name), str_replace(' ', '-', $blog->category->product->first()->name)])}}">
                    <h2>{{trans('text.tag_cadeau_tip')}}</h2>
                    <hr>
                    <h3 class="text-center" style="font-size:16px; color: #3E4F61 !important;">{{$blog->category->product->first()->name}}</h3>
                    <span class="badge" style="border-radius: 100%;  font-size: 28px; top: 220px; right: 20px; height: 70px; width: 70px; line-height: 65px; position: absolute; background-color:#F59D00;">@lang('text.valuta_sign'){{$blog->category->product->first()->value}}</span>
                    <img style="padding: 15px;" src="/img/cardlayout/{{$blog->category->product->first()->category->layout}}" >
                </a>
                <br>
                {{--@if($stock->where('product_id', $product->id)->where('status', 'sell')->count() >= 1)--}}
                    {{--{!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}--}}
                    {{--<input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">--}}
                    {{--<input class="btn btn-default center-block" value="@lang('button.to_cart')" style="background-color: #F59D00; color:#fff;" type="submit">--}}
                    {{--{{ Form::close() }}--}}
                {{--@else--}}
                    {{--<input class="btn btn-default center-block" value="@lang('button.soldout')" style="background-color: #F59D00; color:#fff;" disabled>--}}
                {{--@endif--}}
                {{--<p class="text-center"><small class="text-muted">@lang('text.tag_servicecosts') + @lang('text.valuta_sign'){{$tip->servicecosts}}</small></p>--}}

            </div>
        </div>


    </div>


@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
