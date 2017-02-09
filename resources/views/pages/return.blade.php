{{--default layout from site--}}
@extends('layouts.default')

@section('title', trans('seo.return_policy.online_giftcards').' | '.env('APP_URL'))
@section('description', trans('seo.return_policy.page_description'))

@push('mate-tags')
    <meta name="robots" content="index,nofollow">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('return') !!}

        <div class="col-lg-7">
            {{--<h1>title</h1>--}}

         </div>

    </div>

    <hr>

@stop