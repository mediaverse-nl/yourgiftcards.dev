{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title')
    home page
@endsection

{{--meta tag description--}}
@section('description')
    online kaart verkoop
@stop

{{--content from the page--}}
@section('content')

    meest gekochte kaart
    <div>

    </div>

    <hr>

    <div class="row">

        @foreach($category->product as $product)
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                    <a href="{{route('giftcard.show',[$category->name, str_replace(' ', '-', $product->name)])}}">
                        {{$product->name}}
                        <span class="badge" style=" font-size: 20px; top: 150px; right: 30px; position: absolute">{{$product->value}}</span>
                        <img src="/img/cardlayout/{{$product->category->layout}}" >
                    </a>
                    <a href="{{URL::route('cart.store', $product->id)}}" class="btn btn-default">direct bestellen</a>
                </div>
            </div>
        @endforeach
    </div>

    product description
    <hr>

    handleiding
    <hr>




@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
