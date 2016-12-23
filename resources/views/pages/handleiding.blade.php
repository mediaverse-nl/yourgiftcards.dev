{{--default layout from site--}}
@extends('layouts.default')

@section('title', trans('seo.user_guide.online_giftcards').' | '.env('APP_URL'))
@section('description', trans('seo.user_guide.page_description'))
@section('keywords', ','. trans('seo.user_guide.keywords'))

@push('mate-tags')

@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('manuals') !!}

        <div class="col-lg-9">

            <div class="panel-group" id="accordion">
                <h1 class="">@lang('text.title_guide')</h1>
                @foreach($categories as $category)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{str_replace(' ', '-', $category->name)}}">
                                    {{$category->name}}
                                </a>
                            </h4>
                        </div>
                        <div id="{{str_replace(' ', '-', $category->name)}}" class="panel-collapse collapse" >
                            <div class="panel-body">
                                @lang('categories.instructions.'.$category->name)
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

    <hr>

@stop

{{--this page javascripts--}}
@push('javascript')

@endpush

{{--this page styling--}}
@push('stylesheet')

<style>
    .panel-group .panel {
        border-radius: 0px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: FontAwesome;
        content: '\f04b'; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
</style>
@endpush
