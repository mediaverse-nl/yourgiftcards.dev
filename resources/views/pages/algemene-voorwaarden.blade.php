{{--default layout from site--}}
@extends('layouts.default')

@section('title', trans('seo.algemenevoorwaarden.online_giftcards').' | '.env('APP_URL'))
@section('description', trans('seo.algemenevoorwaarden.page_description'))

@push('mate-tags')
    <meta name="robots" content="noindex,nofollow">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('algemenevoorwaarden') !!}

        <div class="col-lg-7">



        </div>

    </div>

    <hr>

@stop
