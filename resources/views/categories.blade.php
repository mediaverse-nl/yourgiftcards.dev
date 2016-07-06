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

         @foreach($category as $item)
            <div class="col-xs-6 col-md-3">
                <a href="{{URL::route('giftcards', $item->name)}}" class="thumbnail">
                <img src="img/thumbnail/{{$item->thumbnail}}" alt="">
                </a>
                {{$item->name}}
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
