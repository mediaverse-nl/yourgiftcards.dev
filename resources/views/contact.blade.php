{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', trans('seo.contact.page_title'))
@section('description', trans('seo.contact.page_description'))

@push('mate-tags')
    <meta name="robots" content="index, follow">
@endpush

{{--content from the page--}}
@section('content')
    <div class="row">

        <h1 class="col-lg-12">@lang('text.customer_service')</h1>

        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-body">
                    @lang('text.customerservice_text')
                    <br>
                    <br>
                    <a class="btn btn-default" style="background-color: #F59D00; border-radius: 0px; border: none; color: #fff;" href="{{route('guide')}}">@lang('button.user_guide')</a>
                    <br>
                    <br>
                    @lang('text.contact_us_text')<br><br>
                    <a class="btn btn-default" style="background-color: #F59D00; border-radius: 0px; border: none; color: #fff;" href="https://www.facebook.com/Justgiftcardsnl-214283949025796/">Facebook</a>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel">
                {{--<a href="{{route('guide')}}">--}}
                <div class="panel-body">
                    <h2>@lang('text.contact')</h2>

                    @if(Session::has('succes_message'))
                        <div class="alert alert-success fade in "><span class="glyphicon glyphicon-ok"></span><em> {!! session('succes_message') !!}</em></div>
                    @endif

                    {{Form::open(['route' => 'klantenservice.store'])}}
                        <div class="form-group {{$errors->get('email') ? 'has-warning':''}}">
                            {{Form::label('name', trans('text.first_lastname'), ['class' => ''])}}
                            {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'John Doe'])}}
                            @if ($errors->get('name'))
                                <span class="alert-danger" style="padding: 1px 5px; margin-top: 5px;">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->get('email') ? 'has-warning':''}}">
                            {{Form::label('email', 'E-mail', ['class' => ''])}}
                            {{Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'info@justgiftcards.nl'])}}
                            @if ($errors->get('email'))
                                <span class="alert-danger" style="padding: 1px 5px; margin-top: 5px;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->get('message') ? 'has-warning':''}}">
                            {{Form::label('message', trans('text.message'), ['class' => ''])}}
                            {{Form::textarea('message', null, ['class' => 'form-control', 'cols' => '20', 'rows' => '5',])}}
                            @if ($errors->get('message'))
                                <span class="alert-danger" style="padding: 1px 5px; margin-top: 5px;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" style="background-color: #F59D00; border-radius: 0px; border: none; color: #fff;" class="btn btn-default">@lang('button.send')</button>
                    {!! Form::close() !!}

                </div>
                {{--</a>--}}
            </div>
        </div>

    </div>
@stop

@push('stylesheet')
    <style>
        .form-control{
            border-radius: 0px;
        }
        .panel{
            border-radius: 0px;
        }
    </style>
@endpush

