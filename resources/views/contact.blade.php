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

        contact pagina

    </div>
@stop

{{--this page javascripts--}}
@push('javascript')

@endpush
{{--this page styling--}}
@push('stylesheet')

@endpush
