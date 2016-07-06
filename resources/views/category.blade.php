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

    <div class="row">

        {!! Breadcrumbs::render('category', $category) !!}

        <div class="col-lg-4">
            <h3>onze tip</h3>
            <div class="thumbnail" style="height: 260px;">
                <a href="{{route('giftcard.show',[str_replace(' ', '-', $tip->name)])}}">
                    {{$tip->name}}
                    <span class="badge" style=" font-size: 20px; top: 150px; right: 30px; position: absolute">{{$tip->value}}</span>
                    <img src="/img/cardlayout/{{$tip->category->layout}}" >
                </a>
                @if($stock->where('product_id', $tip->id)->count() >= 1)
                    <a href="{{URL::route('cart.store', $tip->id)}}" class="btn btn-default">direct bestellen</a>
                @else
                    <a class="btn btn-primary" disabled="">not in stock</a>
                @endif

            </div>

            <hr>
        </div>
        <div class="col-lg-4 bottom">
            <h3>product description</h3>
            {{$category->description}}
            <hr>
        </div>
        <div class="col-lg-4">
            snel makkelijk en direct


        </div>
    </div>
    <div class="row">

        @foreach($category->product as $product)
            @if($product->id != $tip->id)
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <a href="{{route('giftcard.show',[$category->name, str_replace(' ', '-', $product->name)])}}">
                            {{$product->name}}
                            <span class="badge" style=" font-size: 20px; top: 150px; right: 30px; position: absolute">{{$product->value}}</span>
                            <img src="/img/cardlayout/{{$product->category->layout}}" >
                        </a>
                        @if($stock->where('product_id', $product->id)->count() >= 1)
                            <a href="{{URL::route('cart.store', $product->id)}}" class="btn btn-default">direct bestellen</a>
                        @else
                            <a class="btn btn-primary" disabled="">not in stock</a>
                        @endif

                    </div>
                </div>
            @endif
        @endforeach

    </div>

    <h3>instructions</h3>
    {{$category->instructions}}
    <hr>




@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
