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

            cart order select options for payment

            {!! Form::open(['route' => 'store', 'class' => 'form-horizontal']) !!}

            <fieldset>

                <!-- name -->
                <div class="form-group">
                    {!! Form::label('key', 'key', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                    </div>
                </div>

                <!-- product id -->
                <div class="form-group">
                    {!! Form::label('product_id', 'product_id', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('product_id', $companies)  !!}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary pull-right'] ) !!}
                    </div>
                </div>

            </fieldset>

            {!! Form::close()  !!}

        </div>
    </div>
@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection