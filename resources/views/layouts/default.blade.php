<!DOCTYPE html>
<html lang="{{strtoupper(App::getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">

        <meta name="author" content="Mediaverse">
        <meta name="language" content="{{strtoupper(App::getLocale())}}">
        <meta name="robots" content="index">
        <meta name="revisit-after" content="15 days">
        <meta name="googlebot" content="noodp">

        <meta property="og:description" content="" />
        <meta property="og:determiner" content="the" />
        <meta property="og:locale" content="en_{{strtoupper(App::getLocale())}}" >
        <meta property="og:locale:alternate" content="fr_FR" />
        <meta property="og:locale:alternate" content="es_ES" />
        <meta property="og:site_name" content="" />

        <meta property="og:image" content="http://example.com/ogp.jpg" />
        <meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />


        <meta property="og:title" content="" />
        <meta property="og:type" content="company" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="{{Request::url()}}" />
        <meta property="og:description" content="" />

        <meta property="article:section" content="" />
        <meta property="article:published_time" content="" />
        <meta property="article:modified_time" content="" />
        {{--<!-- for Twitter -->--}}
        <meta name="twitter:card" content="product" />
        <meta name="twitter:title" content="" />
        <meta name="twitter:description" content="" />
        <meta name="twitter:url" content="{{Request::url()}}" />
        <meta name="twitter:image" content="" />



        @stack('mate-tags')
        {{--<meta property="og:image" content="http://example.com/link-to-image.jpg" />--}}

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <link href="http://blazeworx.com/flags.css" rel="stylesheet">

        <style>
            .fa-btn {
                margin-right: 6px;


            }
            html {
                position: relative;
                min-height: 100%;
            }
            /*body {*/
            /*!* Margin bottom by footer height *!*/
            /*padding-bottom: 200px;*/
            /*!*font-family: 'Lato';*!*/
            /*}*/
            footer {
                position: absolute;
                bottom: 0px;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 200px;
                background-color: #2B3E51;
            }

            .navbar {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                width: 100% !important;
                height: 78px !important;
                border-bottom: 30px solid #2B3E51 !important;
                background: #F59D00 !important;

            }
            .navbar-nav > li > a{
                font-weight: bold;
                color: #2B3E51 !important;
            }

            #flag {
                height: 50px;
                position: relative;
                color: white;
            }
            #flag:after {
                content: "";
                position: absolute;
                left: 15px;
                bottom: 0;
                width: 0;
                height: 0;
                border-bottom: 10px solid #2B3E51;
                border-left: 30px solid transparent;
                border-right: 30px solid transparent;
            }

            body {
                font-family: 'Lato' !important;
                background-color: #f7f7f7 !important;
                padding-bottom: 240px;
            }

            .thumbnail{
                background-color: #fff !important;
                border-radius: 0px !important;
            }

            a {
                /*color: #fff;*/
                transition: .5s;
                -moz-transition: .5s;
                -webkit-transition: .5s;
                -o-transition: .5s;
                font-family: 'Muli', sans-serif;
            }

            a:hover { text-decoration: underline }

            h1 {
                padding-bottom: 15px;
                color: #ff6600 !important;
            }

            h1 a {
                font-family: 'Open Sans Condensed', sans-serif;
                font-size: 48px;
                color: #333;
            }

            h1 a:hover {
                color: #ff6600;
                text-decoration: none;
            }

            p {
                color: #333;
                font-family: 'Muli', sans-serif;
                margin-bottom: 15px;
            }

        </style>

        @stack('stylesheet')
    </head>

    <body id="app-layout">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container clear-top">
                @include('includes.header')
            </div>
        </nav>

        <div id="warp" class=" container clear-top"  style="margin-top: 100px;">
            @yield('content')
        </div>

        <footer class="footer">
            @include('includes.footer')
        </footer>

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        <script src="http://blazeworx.com/jquery.flagstrap.min.js"></script>

        @stack('javascript')

    </body>
</html>