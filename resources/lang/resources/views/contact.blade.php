{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', trans('seo.contact.page_title'))
@section('description', trans('seo.contact.page_description'))
@section('keywords', trans('seo.contact.keywords'))

@push('mate-tags')
    <meta name="robots" content="index, nofollow">
@endpush

{{--content from the page--}}
@section('content')
    <div class="row">

        <h1 class="col-lg-12">@lang('text.customer_service')</h1>

        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-body">
                    @lang('text.customerservice')
                    <br>
                    <br>
                    <a class="btn btn-default" style="background-color: #F59D00; border-radius: 0px; border: none; color: #fff;" href="{{route('guide')}}">@lang('button.user_guide')</a>
                    <br>
                    <br>
                    neem contact op via Facebook
                    <a class="btn btn-default" style="background-color: #F59D00; border-radius: 0px; border: none; color: #fff;" href="https://www.facebook.com/Justgiftcardsnl-214283949025796/">Facebook</a>


                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel">
                {{--<a href="{{route('guide')}}">--}}
                <div class="panel-body">
                    <h2>Contact</h2>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('text.first_lastname')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="info@justgiftcards.nl">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('text.message')</label>
                            <textarea class="form-control"  name="" id="" cols="20" rows="5"></textarea>
                        </div>
                        <button type="submit" style="background-color: #F59D00; border-radius: 0px; border: none; color: #fff;" class="btn btn-default">@lang('button.send')</button>
                    </form>

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

