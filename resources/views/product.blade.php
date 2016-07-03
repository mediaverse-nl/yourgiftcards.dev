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

    <img style="height: 150px;" src="/img/thumbnail/{{$product->category->thumbnail}}"><br>

    {{$product->name}}<br>
    {{$product->price}}<br>
    {{$product->servicecosts}}<br>

    <a href="{{route('cart.store', $product->id)}}">bestellen</a>

    <br>
    <br>
    @foreach($category->product as $item)
        @if($product->name != $item->name)
            <div class="thumbnail" style="40px; width: 80px; display: inline-block">
                <a href="{{route('giftcard.show', [$category->name, str_replace(' ', '-', $item->name)])}}">
                    <img src="/img/cardlayout/{{$item->category->layout}}">
                    <span>{{$item->value}}</span>
                </a>
            </div>

        @endif
    @endforeach
    product description
    {{$category->description}}

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
