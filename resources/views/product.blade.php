{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
{{--@section('title', $product->name.' | '.trans('text.delivery').' | '.env('APP_URL'))--}}
@section('title', str_replace(':price', $product->price - $product->discount, $product->name.' :price ').trans('text.currency').' | '.trans('text.delivery').' | '.env('APP_URL'))
@section('description', str_replace([':category', ':price'], [$product->category->name, $product->price - $product->discount], trans('seo.categories.page_description'). ', Category: :category, Price: €:price'))

@push('mate-tags')
    <meta name="robots" content="index, follow">

    <meta property=”og:title” content="{{$product->name}}"/>
    <meta property=”og:image” content="/img/thumbnail/{{$product->category->layout}}"/>
    <meta property=”og:url” content="{{Request::url()}}"/>
    <meta property=”og:description” content="{{$category->description}}"/>
    <meta property="og:site_name" content="justgiftcards.nl" />

    <meta name=”twitter:card” content=”summary”>
    <meta name=”twitter:url” content="{{Request::url()}}">
    <meta name=”twitter:title” content="{{$product->name}}">
    <meta name=”twitter:description” content="{{$category->description}}">
    <meta name=”twitter:image” content="/img/thumbnail/{{$product->category->layout}}">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('product', $product) !!}

        <div class="col-lg-5">

            <div class="" style="position: relative"><br>
                @if($product->discount != '0.00' )
                    <span class="tags">
                        <span class="price-tag"><a href="javascript:void();"><small>@lang('text.tag_discount')</small> €{{$product->discount}}</a></span>
                    </span>
                @endif
                <img itemprop="image" style="width: 100%;" src="/img/thumbnail/{{$product->category->thumbnail}}" alt="{{$product->name}}">
            </div>

            <h1 class="" itemprop="name" >{{$product->name}}</h1>

            @if($product->discount != '0.00')
                <b style="font-weight: bold">@lang('text.tag_price'):</b> <del class="small">€{{$product->price}}</del>
                <b style="font-size: 18px;">€{{$product->price - $product->discount}}</b><br>
            @endif

            @if($product->discount == '0.00')
                <b>@lang('text.tag_price'): </b>€{{$product->price}}<br>
            @endif

            <span class="small">@lang('text.tag_servicecosts'): + {{$product->servicecosts}}</span>
            <br>
            <br>
            <label>@lang('text.tag_amount')</label>
            <br>

            @if($stock->where('product_id', $product->id)->where('status', 'sell')->count() >= 1)
                {!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}
                    <input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">
                    <input class="btn btn-primary pull-left" value="@lang('button.add_to_cart')" type="submit" style="border-radius: 0px; height: 34px;  border: none; background-color: #F59D00;">
                    {{Form::selectRange('number', 1, 5, null, ['class'=> 'form-control pull-left', 'name' => 'qty', 'style' => 'width: 57px; margin-left: 0px; border-radius: 1px;'])}}
                {{ Form::close() }}
            @else
                <input class="btn btn-primary pull-left" value="@lang('button.soldout')" type="submit" style="border-radius: 0px; height: 34px;  border: none; background-color: #F59D00;" disabled>
                {{Form::selectRange('number', 0, 1, null, ['class'=> 'form-control pull-left', 'name' => 'qty', 'style' => 'width: 57px; margin-left: 0px; border-radius: 1px;', 'disabled'])}}
            @endif
            <br>

            <br>
            <br>
            <label>@lang('text.tag_check_this')</label><br>
            @foreach($category->product as $item)
                @if($product->name != $item->name)
                    <div class="thumbnail" style=" width: 80px; display: inline-block">
                        <a href="{{route('giftcard.show', [str_replace(' ', '-', $category->name), str_replace(' ', '-', $item->name)])}}">
                            <img src="/img/cardlayout/{{$item->category->layout}}">
                            <span>€{{$item->value}}</span>
                        </a>
                    </div>
                @endif
            @endforeach
            <hr>
        </div>

        <div class="col-lg-7">
            <h2>@lang('text.title_description')</h2>
            <p itemprop="description">
                @lang('categories.description.'.$category->name)
            </p>
            <hr>

            <h2>@lang('text.title_guide')</h2>
            <p>
                @lang('categories.instructions.'.$category->name)
            </p>
            <hr>

            <h2>@lang('text.title_delivery')</h2>
            <p>
                @php
                    $text = trans('categories.delivery.'.$category->name);
                    echo  str_replace([':category', ':value'], [$category->name, $product->value], $text)
                @endphp
            </p>
            <hr>
        </div>
    </div>

@stop

{{--this page javascripts--}}
@push('javascript')

@endpush

{{--this page styling--}}
@push('stylesheet')
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
@endpush
