{{--default layout from site--}}
@extends('layouts.default')

@section('title', trans('seo.privacy.online_giftcards').' | '.env('APP_URL'))
@section('description', trans('seo.privacy.page_description'))

@push('mate-tags')

@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('privacy') !!}

        <div class="col-lg-7">

        </div>

    </div>

    <hr>

@endsection

{{--this page javascripts--}}
@section('javascript')

@endsection
{{--this page styling--}}
@section('stylesheet')

@endsection
