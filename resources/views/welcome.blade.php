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

        @foreach($categories as $category)
            <div class="col-xs-6 col-md-3">
                <a href="{{URL::route('giftcards', $category->name)}}" class="thumbnail">
                    <img src="img/thumbnail/{{$category->thumbnail}}" alt="">
                </a>
                {{$category->name}}
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
