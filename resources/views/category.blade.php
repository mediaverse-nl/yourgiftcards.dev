{{--default layout from site--}}
@extends('layouts.default')

@section('title', $category->name.' | '.trans('seo.product.online_giftcards').' | '.env('APP_URL'))
@section('description', trans('categories.description.'.$category->name))
@section('keywords', $category->name .','. trans('seo.category.keywords'))

@push('mate-tags')
    <meta property=”og:title” content="{{$category->name}}"/>
    <meta property=”og:image” content="/img/thumbnail/{{$category->thumbnail}}"/>
    <meta property=”og:url” content="{{Request::url()}}"/>
    <meta property=”og:description” content="{{$category->description}}"/>
    <meta property="og:site_name" content="Justgiftcards.nl" />

    <meta name=”twitter:card” content=”summary”>
    <meta name=”twitter:url” content="{{Request::url()}}">
    <meta name=”twitter:title” content="{{$category->name}}">
    <meta name=”twitter:description” content="{{$category->description}}">
    <meta name=”twitter:image” content="/img/thumbnail/{{$category->thumbnail}}">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('category', $category) !!}

        <div class="col-lg-4">
            {{--<h3>@lang('text.tip')</h3>--}}
            <div class="thumbnail container-shadow " style="height: auto">
                <a href="{{route('giftcard.show',[str_replace(' ', '-', $category->name), str_replace(' ', '-', $tip->name)])}}">
                    <h2 class="text-center" style="color: #3E4F61;">{{$tip->name}}</h2>
                    <span class="badge" style="top: 150px; right: 30px; position: absolute; border-radius: 100%; font-size: 25px; height: 70px; width: 70px; line-height: 60px; background-color:#F59D00;">€{{$tip->value}}</span>
                    <img src="/img/cardlayout/{{$tip->category->layout}}" >
                </a>
                <br>
                @if($stock->where('product_id', $tip->id)->where('status', 'sell')->count() >= 1)
                    {!! Form::model($tip, array('route' => 'cart.add', 'method' => 'post')) !!}
                    <input type="hidden" value="{{$tip->id}}" name="product_id" class="pull-left">
                    <input class="btn btn-default center-block" value="@lang('button.to_cart')" style="background-color: #F59D00; color:#fff;" type="submit">
                    {{ Form::close() }}
                @else
                    <input class="btn btn-default center-block" value="@lang('button.soldout')" style="background-color: #F59D00; color:#fff;" disabled>
                @endif

            </div>

            <hr>
        </div>
        <div class="col-lg-5 bottom">
            <h2>@lang('text.product_description')</h2>
            <p>@lang('categories.description.'.$category->name)</p>
            <hr>
        </div>
        <div class="col-lg-3 thumbnail " style="border: 1px dashed #ddd;">
            <br>
            <h3 class="text-center" style="margin: -10px 0px 7px 0px;">@lang('text.tag_mothde')</h3>
            <p class="text-center">
                @foreach($mollie as $item)
                    <img style="padding: 3px;" src="{{$item->image->normal}}">
                @endforeach
            </p>
            <hr>
            <p class="text-center">
                <i class="fa fa-quote-left" aria-hidden="true"></i>
                <b>@lang('text.quote.fast_direct')</b>
                <i class="fa fa-quote-right" aria-hidden="true"></i>
            </p>
            <hr>
            <p class="text-center">
                <b>@lang('text.quote.direct_delivery')</b> <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </p>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="row">
                @foreach($category->product as $product)
                    @if($product->id != $tip->id)
                        <div class="col-xs-6 col-md-3">
                            <div class="thumbnail container-shadow " style="height: auto">
                                <a  href="{{route('giftcard.show',[$category->name, str_replace(' ', '-', $product->name)])}}">
                                    <h3 class="text-center" style="font-size:16px; color: #3E4F61 !important;">{{$product->name}}</h3>
                                    <span class="badge" style="border-radius: 100%;  font-size: 20px; top: 50px; right: 20px; height: 50px; width: 50px; line-height: 45px; position: absolute; background-color:#F59D00;">€{{$product->value}}</span>
                                    <img src="/img/cardlayout/{{$product->category->layout}}" >
                                </a>
                                <br>
                                @if($stock->where('product_id', $product->id)->where('status', 'sell')->count() >= 1)
                                    {!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}
                                        <input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">
                                        <input class="btn btn-default center-block" value="@lang('button.to_cart')" style="background-color: #F59D00; color:#fff;" type="submit">
                                    {{ Form::close() }}
                                @else
                                    <input class="btn btn-default center-block" value="@lang('button.soldout')" style="background-color: #F59D00; color:#fff;" disabled>
                                @endif
                                <p class="text-center"><small class="text-muted">@lang('text.tag_servicecosts') + {{$tip->servicecosts}}</small></p>

                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    <h3>@lang('text.instructions')</h3>
    <p>
        @lang('categories.instructions.'.$category->name)
    </p>
    <hr>

@stop