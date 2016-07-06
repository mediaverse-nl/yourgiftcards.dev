<!DOCTYPE html>
<html lang="en">
    <head>

        <style>
            .fa-btn {
                margin-right: 6px;


            }
             html {
                 position: relative;
                 min-height: 100%;
             }
            body {
                /* Margin bottom by footer height */
                padding-bottom: 200px;
                font-family: 'Lato';
            }
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

        </style>

        @include('includes.head')

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

        @yield('javascript')

    </body>
</html>