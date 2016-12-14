<div class="navbar-header">

    <!-- Collapsed Hamburger -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Branding Image -->
    <a class="navbar-brand" href="{{ route('home') }}">
        yourgiftcards
    </a>
</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li><a href="{{route('home')}}">Home</a></li>
        <li id="flag"><a href="{{route('giftcards.index')}}" >Giftcards</a></li>
        <li><a href="{{route('blog')}}">Nieuws</a></li>
        <li><a href="{{route('klantenservice')}}">Klantenservice</a></li>

    </ul>
    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::check())
            <li><a href="{{route('admin')}}"><i class="fa fa-btn fa-tachometer"></i>admin</a></li>
        @endif
        <li><a href="{{route('cart.index')}}"><i class="fa fa-btn fa-shopping-cart"></i><span class="badge">{{Cart::count()}}</span> @lang('button.cart') </a></li>

    </ul>
</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">

    @foreach($categories as $category)
        <a href="{{route('giftcards', str_replace(' ', '-', $category->name))}}"><img class="img-circle" style="height: 25px;" src="/img/icon/{{$category->icon}}"></a>
    @endforeach

    <span class="pull-right" style="margin-left: 20px; margin-top: 2px;">
        <div id="lang-select" data-selected-country="{{strtoupper(App::getLocale())}}" class="flagstrap">
            <select id="flagstrap-Wct8wGJT" style="display: none;">
                <option value="">select</option>
                @foreach (Config::get('languages') as $lang => $language)
                    <option value="{{strtoupper($lang)}}">{{$language}}</option>
                @endforeach
            </select>
            <button type="button" data-toggle="dropdown" id="flagstrap-drop-down-Wct8wGJT" class="btn btn-primary btn-xs dropdown-toggle">
                <span class="flagstrap-selected-Wct8wGJT">
                    <i class="flagstrap-icon flagstrap-{{App::getLocale()}}" style="margin-right: 20px;"></i>{{strtoupper(App::getLocale())}}
                </span>
                <span class="caret" style="margin-left: 20px;"></span>
            </button>
            <ul id="flagstrap-drop-down-Wct8wGJT-list" aria-labelled-by="flagstrap-drop-down-Wct8wGJT" class="dropdown-menu">
                <li><a data-val="">select</a></li>
                @foreach (Config::get('languages') as $lang => $language)
                    <li><a href="{{ route('lang.switch', $lang) }}" data-val="{{strtoupper($lang)}}"><i class="flagstrap-icon flagstrap-{{$lang}}" style="margin-right: 20px;"></i>{{$language}}</a></li>
                @endforeach
            </ul>
        </div>
        {{--<div id="lang-select" data-selected-country="{{strtoupper(App::getLocale())}}"></div>--}}
    </span>

    <span class="pull-right" style="color: #eeeeee;">direct geleverd per mail 24/7</span>

</div>