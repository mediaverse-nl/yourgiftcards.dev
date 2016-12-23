{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', trans('seo.contact.page_title'))
@section('description', trans('seo.contact.page_description'))
@section('keywords', trans('seo.contact.keywords'))

@push('mate-tags')
    <meta name="language" content="GB">
@endpush

{{--content from the page--}}
@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="panel">
                <a href="{{route('guide')}}">
                <div class="panel-body">
                    Handleiding
                </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel">
                {{--<a href="{{route('guide')}}">--}}
                <div class="panel-body">
                    <h2>Contact</h2>
                </div>
                {{--</a>--}}
            </div>
        </div>

    </div>
@stop

