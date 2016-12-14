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
                    <div class="panel-body">

                           {{$order}}

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