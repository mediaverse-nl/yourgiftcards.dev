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
                margin-bottom: 200px;
                font-family: 'Lato';
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 200px;
                background-color: #f5f5f5;
            }
        </style>

        @include('includes.head')
    </head>

    <body id="app-layout">

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container clear-top">
                @include('includes.header')
            </div>
        </nav>

        <div id="main" class="container clear-top">
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