{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title')
    @lang('product.page_title')
@stop

{{--meta tag description--}}
@section('description')
    @lang('product.page_description')
@stop

{{--content from the page--}}
@section('content')

    {!! Breadcrumbs::render('product', $product) !!}

    <div class="col-lg-5">

        <div class="" style="position: relative"><br>
            @if($product->discount != '0.00' )
                <span class="tags">
                    <span class="price-tag"><a href="javascript:void();"><small>@lang('text.tag_discount')</small> €{{$product->discount}}</a></span>
                </span>
            @endif
            <img style="height: 230px;" src="/img/thumbnail/{{$product->category->thumbnail}}">
        </div>

        <h1 class="" >{{$product->name}}</h1>

        @if($product->discount != '0.00')
            <b style="font-weight: bold">@lang('text.tag_price'):</b> <del class="small">{{$product->price}}</del>
            <b style="font-size: 18px;">{{$product->price - $product->discount}}</b><br>
        @endif

        @if($product->discount == '0.00')
            <b>@lang('text.tag_price'): </b>{{$product->price}}<br>
        @endif
        <span class="small">@lang('text.tag_servicecosts'): + {{$product->servicecosts}}</span><br>

        <br>
        @if($stock->where('product_id', $product->id)->count() >= 1)
            {!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}
                <label>@lang('text.tag_amount')</label>
                <br>

                <input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">

                <input class="btn btn-primary pull-left" value="@lang('button.add_to_cart')" type="submit" style="border-radius: 0px; height: 34px;  border: none; background-color: #F59D00;">

                <select id="qty" class="form-control pull-left" name="qty" style="width: 55px; margin-left: 0px; border-radius: 1px; " >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <br>
            {{ Form::close() }}

            {{--<a href="{{route('cart.store', $product->id)}}">bestellen</a>--}}
        @else
            <a class="btn btn-primary" disabled="">@lang('button.soldout')</a>
        @endif

        <br>
        <br>
        <label>@lang('text.tag_check_this')</label><br>
        @foreach($category->product as $item)
            @if($product->name != $item->name)
                <div class="thumbnail" style=" width: 80px; display: inline-block">
                    <a href="{{route('giftcard.show', [$category, str_replace(' ', '-', $item->name)])}}">
                        <img src="/img/cardlayout/{{$item->category->layout}}">
                        <span>{{$item->value}}</span>
                    </a>
                </div>
            @endif
        @endforeach
        <hr>
    </div>

    <div class="col-lg-7">
        <h2>@lang('text.title_description')</h2>
        <p>Luisterd u of graag naar muziek dan is :category of kinderen dan is :category het beste cadeua om te geven. </p>
        {{$category->description}}aa

        <hr>
        <h2>@lang('text.title_guide')</h2>
        Uw kunt deze :category giftcard van €:euro verzilveren op :domein deze code is wel t/m 13 jaar gelding na aankoop
        {{$category->instructions}}
        <hr>
        <h2>@lang('text.title_delivery')</h2>
        Deze :category giftcard word per direct via mail geleverd
        {{$category->levering}}
        <hr>
    </div>

@stop

{{--this page javascripts--}}
@section('javascript')

@stop
{{--this page styling--}}
@section('stylesheet')
<style>
    .tags{
        position: absolute;
        z-index: 1;
        bottom: 20px;
        right: 0;
    }
    .tags a {
        float: left;
        position: relative;
        width: auto;
        height: 30px;
        margin-left: 20px;
        padding: 0 12px;
        line-height: 30px;
        background: #1f8dd6;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        text-decoration: none;
    }

    .tags a:before {
        content: "";
        position: absolute;
        top: 0;
        width: 0;
        height: 0;
        border-style: solid;
    }

    .tags a:after {
        content: "";
        position: absolute;
        top: 13px;
        width: 4px;
        height: 4px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        background: #fff;
        -moz-box-shadow: -1px -1px 2px #004977;
        -webkit-box-shadow: -1px -1px 2px #004977;
        box-shadow: -1px -1px 2px #004977;
    }
    /* Add rounded corners to right end of the anchor tag */
    .price-tag a {
        -moz-border-radius-bottomright: 4px;
        -webkit-border-bottom-right-radius: 4px;
        border-bottom-right-radius: 4px;
        -moz-border-radius-topright: 4px;
        -webkit-border-top-right-radius: 4px;
        border-top-right-radius: 4px;
    }

    /* Position left and show only right border of triangle  */
    .price-tag a:before {
        left: -15px;
        border-color: transparent #1f8dd6 transparent transparent;
        border-width: 15px 15px 15px 0;
    }

    /* Fix the circle between anchor box and triangle left to it  */
    .price-tag a:after {
        left: -2px;
    }
</style>
@stop
