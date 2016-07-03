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

            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        select a payment method
                    </div>
                    <div class="panel-footer">

                        <div class="container">
                            <div class="">
                                <div class="col-md-5">
                                    {{$cart->price}}
                                </div>
                                <div class="col-md-5">

                                    @if(isset($array))
                                        {{var_dump($array)}}
                                    @endif

                                    @include('errors.message')

                                    {!! Form::open(['route' => 'cart.payment', 'class' => 'form-horizontal']) !!}

                                    <fieldset>

                                        <!-- fullname  -->
                                        <div class="form-group">
                                            {!! Form::label('fullname', 'fullname', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('fullname', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                                            </div>
                                        </div>

                                        <!-- email -->
                                        <div class="form-group">
                                            {!! Form::label('email', 'email', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                                            </div>
                                        </div>

                                        <!-- payment methods -->
                                        <div class="form-group">
                                            {!! Form::label('methods', 'methods', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('methods', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
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

                        </div>

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