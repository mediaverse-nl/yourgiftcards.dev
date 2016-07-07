{{--default layout from site--}}
@extends('layouts.default')

{{--title from the page--}}
@section('title')
    Yourgiftcards - Disclaimer
@endsection

{{--meta tag description--}}
@section('description')

@endsection

{{--meta tag keywords--}}
@section('keywords')
    yourgiftcards, disclaimer
@endsection

{{--meta tag meta tags--}}
@section('mate-tags')

    {{--<meta property="og:title" content="Stuffed Cookies" />--}}
    {{--<meta property="og:image" content="http://fbwerks.com:8000/zhen/cookie.jpg" />--}}
    {{--<meta property="og:description" content="The Turducken of Cookies" />--}}
    {{--<meta property="og:url" content="http://fbwerks.com:8000/zhen/cookie.html">--}}

@endsection

{{--content from the page--}}
@section('content')

    <div class="row">

        {!! Breadcrumbs::render('privacy') !!}

        <div class="col-lg-7">
            <h1>title</h1>

            <h3>lorem ipsum</h3>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
            <h3>lorem ipsum</h3>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
            <h3>lorem ipsum</h3>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
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
