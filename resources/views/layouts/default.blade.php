<!DOCTYPE html>
<html lang="en">
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

        <meta property="fb:admins" content="214283949025796" />
        <meta property="fb:app_id" content="214283949025796" />

        <meta property="og:locale" content="{{App::getLocale() == 'us' || App::getLocale() == 'gb' || App::getLocale() == 'eu' ? 'en' : App::getLocale() }}_{{strtoupper(App::getLocale())}}" />
        @foreach (Config::get('languages') as $lang => $language)
            @if($lang != App::getLocale())
                <meta property="og:locale:alternate" content="{{$lang == 'us' || $lang == 'gb' || $lang == 'eu' ? 'en' : $lang }}_{{strtoupper($lang)}}" />
            @endif
        @endforeach

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

            html {
                position: relative;
                min-height: 100%;
            }
            footer {
                position: absolute;
                bottom: 0px;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 200px;
                background-color: #2B3E51;
            }
            footer ul > li > a{
                color: #fff;
            }

            footer h2{ font-weight: bold}

            .navbar-default{
                background: transparent;
                border:none;
            }

            .top-menu-bar {
                font-size: 18px;
                background: #FFA50A;
                height: 60px !important;
                padding: 5px;
            }

            .container-shadow {
                box-shadow: 0 1px 1px rgba(0,0,0,.1);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.1);
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.1);
                border-collapse: separate;
            }

            .top-menu-bottom {
                height: 48px !important;
                background-color: rgba(43, 62, 81, 0.9) ;
                padding: 5px;
            }

            .navbar {
                width: 100% !important;
                height: 108px !important;
            }
            .navbar-nav > li > a{
                font-weight: bold;
                color: #2B3E51 !important;
            }

            body {
                font-family: 'Lato' !important;
                background-color: #EEEEEE !important;
                padding-bottom: 240px;
                padding-top: 30px;
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
            .cate-icons{
                height: 35px;
                width: 35px;
                border: 1px solid #fff;
                margin-right: 2px;
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                -ms-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
            }
            .delivery-text{
                margin-top: 7px !important;
                color: #eeeeee;
            }
            .lang{
                margin-top: 6px !important;
                margin-left: 5px;
            }
            .top-menu-bottom.smaller .delivery-text{
                margin-top: 3px !important;
            }
            .top-menu-bottom.smaller .lang{
                margin-top: 1px !important;
            }

            .top-menu-bottom.smaller .cate-icons {
                height: 25px !important;
                width: 25px !important;
                -webkit-transition: all 0.1s;
                -moz-transition: all 0.1s;
                -ms-transition: all 0.1s;
                -o-transition: all 0.1s;
                transition: all 0.1s;
            }
            .top-menu-bottom.smaller {
                height: 35px !important;
                line-height: 20px;
            }

        </style>

        @stack('stylesheet')
    </head>

    <body id="app-layout" itemscope itemtype="{{Request::url()}}">

        <nav class="navbar navbar-default navbar-fixed-top">
            @include('includes.header')
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

        <script>
            {{--facebook sdk--}}
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '1210665952342358',
                    xfbml      : true,
                    version    : 'v2.8'
                });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <script>
            {{--scroll menu bar--}}
            $(window).scroll(function() {
                if ($(document).scrollTop() > 40) {
                    $('.top-menu-bottom ').addClass('smaller');
                } else {
                    $('.top-menu-bottom ').removeClass('smaller');
                }
            });

        </script>

        @stack('javascript')

    </body>
</html>