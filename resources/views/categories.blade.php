{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', trans('seo.categories.page_title'))
@section('description', trans('seo.categories.page_description'))
@section('keywords', trans('seo.categories.keywords'))

@push('mate-tags')
{{--<meta name="language" content="GB">--}}
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">
        {!! Breadcrumbs::render('giftcards') !!}
        <div class="col-lg-12">
            <h1>@lang('text.categories_title')</h1>
            <p class="caption">
                @lang('text.categories_text')
            </p>
        </div>

         @foreach($category as $item)
            <div class="col-xs-6 col-md-3" style="height: 140px !important; margin: 50px 0px; padding: 10px !important; ">
                <a href="{{URL::route('giftcards', $item->name)}}" class="thumbnail container-shadow">
                    <img style="height: 140px; width: 100%" src="img/thumbnail/{{$item->thumbnail}}" alt="">
                    <div class="caption">
                        <h2 class="text-center" style="font-size: 20px; margin: 15px;">{{$item->name}}</h2>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
    <br>
    <br>
    <hr>
@stop
