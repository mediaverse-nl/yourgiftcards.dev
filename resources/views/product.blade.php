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

    {!! Breadcrumbs::render('product', $product) !!}

    <div class="col-lg-5">

        <div>
            <img style="height: 230px;" src="/img/thumbnail/{{$product->category->thumbnail}}"><br>
            @if($product->discount != '0.00' )
                <label class="badge" style="font-size: 20px; margin-top: -70px; margin-left: 280px;">{{$product->discount}}</label>
            @endif
        </div>

        <h1>{{$product->name}}</h1><br>

        @if($product->discount != '0.00')
            price: <del class="small">{{$product->price}}</del>
             <b style="font-size: 18px;">{{$product->price - $product->discount}}</b><br>
        @endif

        @if($product->discount == '0.00')
            price: {{$product->price}}<br>sss
        @endif
        <span class="small">servicecosts: + {{$product->servicecosts}}</span><br>

        <br>
        @if($stock->where('product_id', $product->id)->count() >= 1)
            {!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}
                <label>Aantal</label>
                <br>

                <input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">

                <button class=" btn btn-primary pull-left" type="submit">
                    Toevoegen aan winkelwagen
                </button>
                <select id="qty" class="form-control pull-left" name="qty" style="width: 55px;" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <br>
            {{ Form::close() }}

            {{--<a href="{{route('cart.store', $product->id)}}">bestellen</a>--}}
        @else
            <a class="btn btn-primary" disabled="">not in stock</a>
        @endif

        <br>
        <br>
        <label>relaties</label><br>
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
        <h2>product description</h2>
        {{$category->description}}

        <hr>
        <h2>handleiding</h2>
        {{$category->instructions}}
        <hr>
        <h2>levering</h2>
        {{$category->levering}}
        <hr>
    </div>

@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
