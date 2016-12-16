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
        {!! Breadcrumbs::render('giftcards') !!}

        <h1>Kies een giftcard</h1>
        <p>
            Opzoek naar een giftcard zoek niet langer u kunt hier kiezen uit onze select aan giftcards
        </p>

         @foreach($category as $item)
            <div class="col-xs-6 col-md-3 " style="height: 140px !important; margin: 40px 0px; padding: 10px !important; ">
                <a href="{{URL::route('giftcards', $item->name)}}" class="thumbnail">
                    <img style="height: 140px; width: 100%" src="img/thumbnail/{{$item->thumbnail}}" alt="">
                    <div class="caption">
                        <p>{{$item->name}}</p>
                    </div>
                </a>
            </div>
        @endforeach



    </div>
    <br>
    <br>
    <hr>
@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
