{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title', trans('seo.home.page_title'))
@section('description', trans('seo.home.page_description'))
@section('keywords', trans('seo.home.keywords'))

@push('mate-tags')
    {{--<meta name="language" content="GB">--}}
@endpush

{{--content from the page--}}
@section('content')

    {!! Breadcrumbs::render('home') !!}

    <div class="single-item" style="height: 200px;">
        <div class="col-lg-12 text-center" style="background-color: #F59D00; height: 200px;"> <h1>Giftcards 24/7 via mail</h1></div>
        <div class="col-lg-12 text-center" style="background-color: #F59D00; height: 200px;"> <h1>Geen account nodig simpel betalen met ideal, of een van onze andere opties, en je krijgt meteen je gift(s) per mail toegestuurd.</h1></div>
    </div>

    <br>
    <br>
    <div class="container">
        <div class="row">

            <h1>product</h1>
            {{--{{$product}}--}}

            @foreach($product as $item)
                <div class="col-xs-6 col-md-3">
                    <a href="{{URL::route('giftcard.show', [$item->id, str_replace(' ', '-', $item->name)] )}}" class="thumbnail">
                        <img src="/img/thumbnail/{{$item->category->thumbnail}}" alt="">
                    </a>
                    <h2>{{$item->name}}</h2>
                </div>
            @endforeach

        </div>
    </div>

    <br>
    <br>
    <br>
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
                autoplaySpeed: 2000,
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
@endpush
