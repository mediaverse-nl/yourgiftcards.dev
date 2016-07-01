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

        @foreach($category->product as $product)
            <div class="col-xs-6 col-md-3">
                <a href="{{URL::route('cart.store', $product->id)}}" class="thumbnail">
                    {{$product->name}}
                    {{$product->value}}
                    <img src="/img/cardlayout/{{$product->category->layout}}" >
                </a>
            </div>
        @endforeach

    </div>


@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
