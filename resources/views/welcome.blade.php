{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', trans('seo.home.page_title').' | '.'justgiftcards')
@section('description', trans('seo.home.page_description'))
{{--@section('keywords', trans('seo.home.keywords'))--}}

@push('mate-tags')
    <meta name="robots" content="index,follow">
@endpush

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('home') !!}

        <div class="single-item col-lg-7">
            <div class="text-center"> <h1>@lang('banner.first')</h1></div>
            <div class="text-center"> <h1>@lang('banner.second')</h1></div>
            <div class="text-center"> <h1>@lang('banner.third')</h1></div>
        </div>

        <div class="col-lg-5">
            <div class="panel giftcard-panel">
                <div class="panel-body">
                    <h1>@lang('text.take_a_look')</h1><br><hr style="margin-top: -25px;">
                    @foreach($category as $cate)
                        <a href="{{route('giftcards', str_replace(' ', '-', $cate->name))}}">
                            <img style="width: 24%; padding: 5px;" src="/img/cardlayout/{{$cate->layout}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{--{{$product}}--}}
        <div class="col-lg-12">
            <div class="row">
                <h1 class="col-lg-12">@lang('text.best_sold')</h1>
                @foreach($product as $item)
                    <div class="col-xs-6 col-md-3">
                        <a href="{{URL::route('giftcard.show', [$item['id'], str_replace(' ', '-', $item['name'])] )}}" class="thumbnail">
                            <img style="height: 145px !important; width: 100%;" src="/img/thumbnail/{{$item['category']['thumbnail']}}" alt="">
                        </a>
                        <h2>{{($item['name'])}}</h2>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <br>

@stop

{{--this page javascripts--}}
@push('javascript')
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.single-item').slick({
                dots: true,
                infinite: true,
                speed: 700,
                autoplay:true,
                autoplaySpeed: 8000,
                arrows:false,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        });
    </script>
@endpush

{{--this page styling--}}
@push('stylesheet')
    <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <style>
        .single-item{
            height: 250px;
        }
        .panel{
            border-radius: 0px;
        }
        .giftcard-panel a{
            text-decoration: none;
        }
        .slick-slide {
            outline: none
        }
    </style>

@endpush
