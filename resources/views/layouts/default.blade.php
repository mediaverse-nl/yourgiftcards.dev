<!DOCTYPE html>
<html lang="en">
    <head>

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
        <script src="http://blazeworx.com/jquery.flagstrap.min.js"></script>

        @yield('javascript')

        <script>
            {{--$('#lang-select').flagStrap({--}}
                {{--countries: {--}}
                    {{--"SE": "España",--}}
                    {{--"GB": "United Kingdom",--}}
                    {{--"US": "United Status",--}}
                    {{--"EU": "Europa",--}}
                    {{--"BE": "België",--}}
                    {{--"CU": "Curaçao",--}}
                    {{--"DE": "Deutschland",--}}
                    {{--"FR": "Français",--}}
                    {{--"NL": "Nederland"--}}
                {{--},--}}
                {{--buttonSize: "btn-xs",--}}
                {{--buttonType: "btn-primary",--}}
                {{--labelMargin: "20px",--}}
                {{--scrollable: false,--}}
                {{--scrollableHeight: "350px",--}}
                {{--placeholder: {--}}
                    {{--value: "",--}}
                    {{--text: {!! json_encode(trans('button.lang-select'))!!}--}}
                {{--}--}}
            {{--});--}}
//            $("#lang-select").find("select").change(function(){ $('input[name= Flag]').val($(this).val());})
        </script>

    </body>
</html>