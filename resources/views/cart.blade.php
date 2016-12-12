{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title')
    winkelwagen
@endsection

{{--meta tag description--}}
@section('description')
    online kaart verkoop
@stop

{{--content from the page--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-xs-6">
                                    <a class="btn btn-primary btn-sm btn-block"href="{{route('giftcards.index')}}">
                                        <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
{{--                        @if(Session::has('cart'))--}}

                            {{--{{dd($products)}}--}}

                            {{--{{dd($cart)}}--}}
                            @foreach($cart as $item)

                                <div class="row">
                                    <div class="col-xs-2"><img class="img-responsive" src="/img/cardlayout/{{$item->options[0]->category->layout}}">
                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name">
                                            <strong>{{$item->options[0]->name}}</strong>
                                        </h4>
                                        <h4>
                                            <small class="">{{str_limit($item->options[0]->category->description, 50, '...')}}</small>
                                        </h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-4 text-right">
                                            @if($item->options[0]->discount == 0)
                                                <h6><strong>€{{$item->price - $item->options[0]->servicecosts}}<span class="text-muted"></span></strong></h6>
                                            @else
                                                <h6><span class="discount">€{{$item->options[0]->price}}</span><strong>€{{$item->price - $item->options[0]->servicecosts}}<span class="text-muted"></span></strong></h6>
                                            @endif
                                            <small class="text-muted">servicekoste €{{$item->options[0]->servicecosts}} p.st.</small>
                                        </div>
                                        <div class="col-xs-6">
                                            <form method="POST" action="{{route('cart.decrease')}}" style="display: inline-block">
                                                <input type="hidden" name="row" value="{{$item->rowId}}">
                                                <input type="hidden" name="qty" value="{{$item->qty - 1}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-fefault btn-xs add-to-cart">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>
                                          {{$item->qty}}
                                            <form method="POST" action="{{route('cart.increase')}}" style="display: inline-block">
                                                <input type="hidden" name="row" value="{{$item->rowId}}">
                                                <input type="hidden" name="qty" value="{{$item->qty + 1}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-fefault btn-xs add-to-cart">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-xs-2">
                                            <form method="POST" action="{{route('cart.remove')}}">
                                                <input type="hidden" name="row" value="{{$item->rowId}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-fefault  btn-xs add-to-cart">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach

                        {{--@else--}}
                            {{--empty cart--}}
                        {{--@endif--}}

                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <h4 class="text-right">Total <strong>${{Cart::subtotal()}}</strong></h4>
                            </div>
                            <div class="col-xs-3">
                                <a href="{{URL::route('cart.checkout')}}" class="btn btn-success btn-block">
                                    checkout
                                </a>
                                {{Form::open(['route' => 'cart.empty'])}}
                                    {{Form::submit('legen', ['class' => 'btn btn-danger btn-block', count(Cart::content()) ? '': 'disabled'])}}
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

    <style>
        .discount {
            position: relative;
            margin: 10px;
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
    </style>
@endsection