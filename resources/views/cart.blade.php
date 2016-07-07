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
                        @if(Session::has('cart'))

                            {{--{{dd($products)}}--}}

                            {{--{{dd($products)}}--}}
                            @foreach($products as $product)
                                <div class="row">
                                    <div class="col-xs-2"><img class="img-responsive" src="/img/cardlayout/{{$product['item']->category->layout}}">
                                    </div>
                                    <div class="col-xs-4">
                                        <h4 class="product-name">
                                            <strong>{{$product['item']['name']}} - {{$product['item']['value']}}</strong>
                                        </h4>
                                        <h4>
                                            <small>{{str_limit($product['item']->category->description, 50, '...')}}</small>
                                        </h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-4 text-right">
                                            <h6><strong>€{{$product['price']}}<span class="text-muted"></span></strong></h6>
                                        </div>
                                        <div class="col-xs-6">
                                            <a href="{{route('cart.store', $product['item']['name'])}}" class="btn btn-sm btn-default fa fa-minus pull-left" aria-hidden="true"></a>
                                            <input type="text" style="width: 40px; margin-right: 4px;" class="form-control input-sm pull-left text-center" value="{{$product['qty']}}" disabled>
                                            <a href="{{route('cart.store', $product['item']['name'])}}" class="btn btn-sm btn-default fa fa-plus pull-left" aria-hidden="true"></a>
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

                        @else
                            empty cart
                        @endif

                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <h4 class="text-right">Total <strong>${{$totalPrice}}</strong></h4>
                            </div>
                            <div class="col-xs-3">
                                <a href="{{URL::route('cart.checkout')}}" class="btn btn-success btn-block">
                                    checkout
                                </a>
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