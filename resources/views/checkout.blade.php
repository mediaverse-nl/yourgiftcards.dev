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

            @include('errors.message')

            <div class="col-lg-10 col-lg-offset-1">

                <div class="panel panel-default">
                    <div class="panel-footer">
                        <div class="row">

                            <div class="col-md-6">

                                <table class="table-responsive table">
                                    <tr>
                                        <th>product</th>
                                        <th>price</th>
                                    </tr>
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>
                                <div class="col-md-6">

                                    {!! Form::open(['route' => 'order.create', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

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
                                                {{--{!! Form::text('methods', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}--}}
                                                {!! Form::select('methods', collect($mollie)->pluck('id', 'id')) !!}

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


                        @foreach($mollie as $item)
                            {{$item->id}}
                            <img src="{{$item->image->bigger}}">
                        @endforeach
                            {{--{{dd($mollie)}}--}}

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