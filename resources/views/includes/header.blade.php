<nav class="navbar navbar-default">
    <div class="container-fluid" style="background-color: #FFA50A;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container">
                <ul class="nav navbar-nav ">
                    <li><a href="{{route('home')}}">@lang('button.home')</a></li>
                    <li ><a href="{{route('giftcards.index')}}" >@lang('button.giftcards')</a></li>
                    <li><a href="{{route('blog')}}">@lang('button.blog')</a></li>
                    <li><a href="{{route('klantenservice')}}">@lang('button.service')</a></li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    @if (Auth::check())
                        <li><a href="{{route('admin')}}"><i class="fa fa-btn fa-tachometer"></i>admin</a></li>
                    @endif

                    <li>
                        <a href="{{route('cart.index')}}" style="">
                            <i class="fa fa-btn fa-shopping-cart cart-icon"></i>
                            <span class="badge cart-badge" style="background-color: #EEEEEE; color: #2B3E51; border: 1px solid #2B3E51;">{{Cart::count()}}</span>
                            {{--@lang('button.cart')--}}
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{--<img  src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.7.0/flags/1x1/{{App::getLocale()}}.svg">--}}
                            <span style="width: 22px; height: 22px; padding-top: 4px;" class="flag-icon flag-icon-{{App::getLocale()}} flag-icon-squared"></span>
                            <span>{{strtoupper(App::getLocale())}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lang">
                            @foreach (Config::get('languages') as $lang => $language)
                                <li><a href="{{ route('lang.switch', $lang) }}" data-val="{{strtoupper($lang)}}"><span class="flag-icon flag-icon-{{$lang}}" style="margin-right: 20px;"></span></i>{{$language}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</nav>



{{--<div class="navbar-header">--}}

    {{--<!-- Collapsed Hamburger -->--}}
    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
        {{--<span class="sr-only">Toggle Navigation</span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
    {{--</button>--}}

    {{--<div class="top-menu-bar"  id="app-navbar-collapse" >--}}
        {{--<div class="container">--}}
            {{--<!-- Branding Image -->--}}
            {{--<a class="navbar-brand" href="{{ route('home') }}">--}}
                {{--justgiftcards--}}
            {{--</a>--}}

            {{--<!-- Left Side Of Navbar -->--}}
            {{--<ul class="nav navbar-nav ">--}}
                {{--<li><a href="{{route('home')}}">@lang('button.home')</a></li>--}}
                {{--<li id="flag"><a href="{{route('giftcards.index')}}" >@lang('button.giftcards')</a></li>--}}
                {{--<li><a href="{{route('blog')}}">@lang('button.blog')</a></li>--}}
                {{--<li><a href="{{route('klantenservice')}}">@lang('button.service')</a></li>--}}
            {{--</ul>--}}
            {{--<!-- Right Side Of Navbar -->--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<!-- Authentication Links -->--}}
                {{--@if (Auth::check())--}}
                    {{--<li><a href="{{route('admin')}}"><i class="fa fa-btn fa-tachometer"></i>admin</a></li>--}}
                {{--@endif--}}

                {{--<li>--}}
                    {{--<a href="{{route('cart.index')}}" style="">--}}
                        {{--<i class="fa fa-btn fa-shopping-cart" style="margin-top: -20px; display: inline-block; position: relative; font-size: 38px; vertical-align: middle; line-height: 50px; margin-right:15px;">--}}
                        {{--<span class="badge" style=" position: absolute; border-radius: 50%; padding: 3px 6px !important; border: 2px solid #FFA50A; font-weight: bolder;--}}
                                    {{--color: #FFA50A; top: 3px; right: -7px;">{{Cart::count()}}</span>--}}
                        {{--</i>--}}
                        {{--@lang('button.cart')--}}
                    {{--</a>--}}
                {{--</li>--}}


            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="top-menu-bottom " id="app-navbar-collapse">--}}

        {{--<div class="container">--}}
            {{--<span style="color: #fff;">Zie ook: </span>--}}
            {{--@foreach($categories as $category)--}}
                {{--<a href="{{route('giftcards', str_replace(' ', '-', $category->name))}}">--}}
                    {{--<img class="img-circle cate-icons" src="/img/icon/{{$category->icon}}">--}}
                {{--</a>--}}
            {{--@endforeach--}}

            {{--<span class="pull-right lang">--}}
                {{--<div id="lang-select" data-selected-country="{{strtoupper(App::getLocale())}}" class="flagstrap">--}}
                    {{--<select id="flagstrap-Wct8wGJT" style="display: none;">--}}
                        {{--@foreach (Config::get('languages') as $lang => $language)--}}
                            {{--<option value="{{strtoupper($lang)}}">{{$language}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                    {{--<button type="button" data-toggle="dropdown" id="flagstrap-drop-down-Wct8wGJT" class="btn btn-primary btn-xs dropdown-toggle">--}}
                        {{--<span class="flagstrap-selected-Wct8wGJT">--}}
                            {{--<i class="flagstrap-icon flagstrap-{{App::getLocale()}}" style="margin-right: 20px;"></i>{{strtoupper(App::getLocale())}}--}}
                        {{--</span>--}}
                        {{--<span class="caret" style="margin-left: 20px;"></span>--}}
                    {{--</button>--}}
                    {{--<ul id="flagstrap-drop-down-Wct8wGJT-list" aria-labelled-by="flagstrap-drop-down-Wct8wGJT" class="dropdown-menu">--}}
                        {{--@foreach (Config::get('languages') as $lang => $language)--}}
                            {{--<li><a href="{{ route('lang.switch', $lang) }}" data-val="{{strtoupper($lang)}}"><i class="flagstrap-icon flagstrap-{{$lang}}" style="margin-right: 20px;"></i>{{$language}}</a></li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                    {{--<div id="lang-select" data-selected-country="{{strtoupper(App::getLocale())}}"></div>--}}
            {{--</span>--}}

            {{--<span class="pull-right delivery-text">@lang('text.delivery')</span>--}}

        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}



<style>
    @media (max-width: 767px) {
        /* CSS goes here */
        /*#myNavbar{*/
            /*background-color: #2B3E51 !important;*/
            /*color: #F59D00;*/
        /*}*/
        /*.nav  {*/
            /*color: #F59D00 !important;*/
        /*}*/
    }
</style>