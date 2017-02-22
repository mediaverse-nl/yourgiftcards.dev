{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', trans('seo.cart.page_title'))
@section('description', trans('seo.cart.page_description'))
@section('keywords', trans('seo.cart.keywords'))

@push('mate-tags')
    <meta name="robots" content="noindex,nofollow">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('cart') !!}

        {{--<h1 class="col-lg-12">@lang('text.cart')</h1>--}}


        <div class="col-xs-8">
            <div class="panel">
                <div class="panel-body">
                    <span class="text-left" style="font-size: 23px; font-weight: bold">{{trans('text.cart')}}</span>
                    <hr>
                    {{--{{dd($cart)}}--}}
                    @if($cart->isEmpty())
                        @lang('text.empty_cart')
                    @endif

                    @foreach($cart as $item)

                        <div class="row">
                            <div class="col-xs-1">
                                <form method="POST" action="{{route('cart.remove')}}">
                                    <input type="hidden" name="row" value="{{$item->rowId}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-fefault  btn-xs add-to-cart" style="margin-top: 30px; margin-left: 5px;">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-xs-3">
                                <img class="img-responsive" src="/img/cardlayout/{{$item->options[0]->category->layout}}" style="margin-top: 0px;">
                            </div>
                            <div class="col-xs-3">
                                <h4 class="product-name">
                                    <strong>{{$item->options[0]->name}}</strong>
                                </h4>
                                <h4>
                                    <small class="">{{str_limit(trans('categories.description.'.$item->options[0]->category->name), 50, '...')}}</small>
                                </h4>
                            </div>
                            <div class="col-xs-5">
                                <div class="col-xs-6">
                                    <label style="margin-top: 0px; margin-bottom: 15px;">@lang('text.tag_amount')</label><br>
                                    <form method="POST" action="{{route('cart.decrease')}}" style="display: inline-block">
                                        <input type="hidden" name="row" value="{{$item->rowId}}">
                                        <input type="hidden" name="qty" value="{{$item->qty - 1}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-fefault btn-xs add-to-cart"
                                        {{$item->qty != 1 ? : 'disabled'}}
                                        >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </form>
                                    {{$item->qty}}
                                    <form method="POST" action="{{route('cart.increase')}}" style="display: inline-block">
                                        <input type="hidden" name="row" value="{{$item->rowId}}">
                                        <input type="hidden" name="qty" value="{{$item->qty + 1}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-fefault btn-xs add-to-cart"
                                        {{$item->qty < \App\Productkey::where('product_id', $item->id)->where('status', 'sell')->where('region', App::getLocale())->count() ? : 'disabled'}}>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-xs-6">
                                    <b>@lang('text.tag_price')</b>
                                    @if($item->options[0]->discount == 0)
                                        <h6>
                                            <strong>@lang('text.valuta_sign'){{$item->price - $item->options[0]->servicecosts}}</strong>
                                        </h6>
                                    @else
                                        <h6>
                                            <span class="discount">@lang('text.valuta_sign'){{$item->options[0]->price}}</span>
                                            <strong>
                                                @lang('text.valuta_sign'){{$item->price - $item->options[0]->servicecosts}}
                                            </strong>
                                        </h6>
                                    @endif
                                    <small class="text-muted">@lang('text.tag_servicecosts')
                                        <br>+ @lang('text.valuta_sign'){{number_format($item->options[0]->servicecosts * $item->qty, 2)}}</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-body">

                    <span class="text-left" style="font-size: 23px; font-weight: bold">@lang('text.tag_total')</span>
                    <span class="text-right" style="font-size: 23px; float: right">@lang('text.valuta_sign') {{Cart::subtotal()}}</span>

                    <hr>
                    <a href="{{URL::route('cart.checkout')}}" class="btn btn-success btn-block">
                        <b>@lang('button.checkout')</b>
                    </a>
                    <br>
                    {{Form::open(['route' => 'cart.empty'])}}
                    {{Form::submit(trans('button.empty'), ['class' => 'btn btn-danger btn-block', count(Cart::content()) ? '': 'disabled'])}}
                    {{Form::close()}}

                    <hr>
                    <h2>@lang('text.tag_method')</h2>
                    <p>
                        @foreach($mollie as $item)
                            <img style="padding: 3px;" src="{{$item->image->normal}}">
                        @endforeach
                    </p>
                    <hr>

                </div>
            </div>
        </div>

    </div>
@stop

{{--this page javascripts--}}
@push('javascript')

@endpush

{{--this page styling--}}
@push('stylesheet')
    <style>
        .discount {
            position: relative;
            margin: 10px;
            margin-left: 0px;
        }
        .discount:before{
            position: absolute;
            content: "";
            left: 0;
            top: 50%;
            right: 0;
            border-top: 1px solid;
            border-color: inherit;
            -webkit-transform: rotate(-5deg);
            -moz-transform: rotate(-5deg);
            -ms-transform: rotate(-5deg);
            -o-transform: rotate(-5deg);
            transform: rotate(-5deg);
        }
        .panel {
            border-radius: 0px;
        }
        .panel-body  .btn{
            width: 100%;
            border:none;
            padding: 10px;
            border-radius: 0px;
        }
        .btn-success{
            width: 100%;
            background-color: #FFA50A;
        }
        .btn-success:hover{
            background-color: #FFA50A;
            opacity: .65;
        }
    </style>
@endpush
