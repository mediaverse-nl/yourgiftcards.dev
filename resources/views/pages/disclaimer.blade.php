{{--default layout from site--}}
@extends('layouts.default')

@section('title', trans('seo.disclaimer.online_giftcards').' | '.env('APP_URL'))
@section('description', trans('seo.disclaimer.page_description'))

@push('mate-tags')

@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('disclaimer') !!}

        <div class="col-lg-7">

        </div>

    </div>

    <hr>

@stop