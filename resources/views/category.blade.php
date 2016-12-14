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
            <div class="thumbnail" style="height: auto">
                <a href="{{route('giftcard.show',[$category->name, str_replace(' ', '-', $tip->name)])}}">
                    <h2 class="text-center">{{$tip->name}}</h2>
                    <span class="badge" style="top: 150px; right: 30px; position: absolute; border-radius: 100%; font-size: 25px; height: 70px; width: 70px; line-height: 60px; background-color:#F59D00;">€{{$tip->value}}</span>
                    <img src="/img/cardlayout/{{$tip->category->layout}}" >
                </a>
                @if($stock->where('product_id', $tip->id)->count() >= 1)
                    {!! Form::model($tip, array('route' => 'cart.add', 'method' => 'post')) !!}
                    <input type="hidden" value="{{$tip->id}}" name="product_id" class="pull-left">
                    <input class="btn btn-default center-block" value="direct bestellen" style="background-color: #F59D00; color:#fff;" type="submit">
                    {{ Form::close() }}
                @else
                    <input class="btn btn-default center-block" value="uitverkocht" style="background-color: #F59D00; color:#fff;" disabled>
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
                    <div class="thumbnail" style="height: auto">
                        <a  href="{{route('giftcard.show',[$category->name, str_replace(' ', '-', $product->name)])}}">
                            <h3 class="text-center" style="font-size:16px; ">{{$product->name}}</h3>
                            <span class="badge" style="border-radius: 100%;  font-size: 20px; top: 50px; right: 20px; height: 50px; width: 50px; line-height: 45px; position: absolute; background-color:#F59D00;">€{{$product->value}}</span>
                            <img src="/img/cardlayout/{{$product->category->layout}}" >
                        </a>
                        <br>
                        @if($stock->where('product_id', $product->id)->count() >= 1)
                            {!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}
                                <input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">
                                <input class="btn btn-default center-block" value="direct bestellen" style="background-color: #F59D00; color:#fff;" type="submit">
                            {{ Form::close() }}
                        @else
                            <input class="btn btn-default center-block" value="uitverkocht" style="background-color: #F59D00; color:#fff;" disabled>
                        @endif
                        <p class="text-center"><small>Servicekosten + {{$tip->servicecosts}}</small></p>

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
