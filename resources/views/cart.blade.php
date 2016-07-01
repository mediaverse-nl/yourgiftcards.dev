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
                                    <button type="button" class="btn btn-primary btn-sm btn-block">
                                        <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('cart'))

                            {{--{{dd($products)}}--}}
                            @foreach($products as $product)
                                <div class="row">
                                    <div class="col-xs-2"><img class="img-responsive" src="/img/cardlayout/{{$product['item']->category->layout}}">
                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name"><strong>{{$product['item']['name']}} - {{$product['item']['value']}}</strong></h4><h4><small>Product description</small></h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 text-right">
                                            <h6><strong>€{{$product['price']}}<span class="text-muted"></span></strong></h6>
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control input-sm" value="{{$product['qty']}}">
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="button" class="btn btn-link btn-xs">
                                                <span class="glyphicon glyphicon-trash"> </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
            <br>
                            total price

                        @else
                            empty cart
                        @endif

                        <div class="row">
                            <div class="text-center">
                                <div class="col-xs-9">
                                    <h6 class="text-right">Added items?</h6>
                                </div>
                                <div class="col-xs-3">
                                    <button type="button" class="btn btn-default btn-sm btn-block">
                                        Update cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <h4 class="text-right">Total <strong>${{$totalPrice}}</strong></h4>
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-success btn-block">
                                    Checkout
                                </button>
                                <a href="{{URL::route('cart.empty')}}" class="btn btn-danger btn-block">
                                    empty
                                </a>
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

@endsection