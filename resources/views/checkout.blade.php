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
    <div class="row">

        @include('errors.message')

        <div class="col-lg-9">

            <div class="col-md-8">

                <table class="table-responsive table">
                    <tr>
                        <th> </th>
                        <th>product</th>
                        <th>@lang('text.tag_amount')</th>
                        <th>@lang('text.tag_price')</th>
                    </tr>
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td>
                                <img style="width: 120px;" src="/img/thumbnail/{{$item->options[0]->category->thumbnail}}">
                            </td>
                            <td>
                                {{$item->name}}<br>
                                {{$item->options[0]->category->name}}
                            </td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <div class="col-md-4">

                <div class="thumbnail">


                    {!! Form::open(['route' => 'order.create', 'class' => '', 'method' => 'POST']) !!}

                    <fieldset>

                        <!-- fullname  -->
                        <div class="form-group">
                            {!! Form::label('fullname', 'fullname', ['class' => 'control-label']) !!}
                            {!! Form::text('fullname', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            {!! Form::label('email', 'email', ['class' => 'control-label']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>

                        <!-- payment methods -->
                        <div class="form-group">
                            {!! Form::label('methods', 'methods', ['class' => 'control-label']) !!}
                            {!! Form::select('methods', collect($mollie)->pluck('id', 'id'), null, ['class' => 'form-control', 'placeholder' => '--- select ---']) !!}
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary pull-right'] ) !!}
                        </div>

                    {{--</fieldset>--}}

                    {!! Form::close()  !!}

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