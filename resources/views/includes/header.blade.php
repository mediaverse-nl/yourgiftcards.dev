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
        <li><a href="{{route('cart.index')}}"><i class="fa fa-btn fa-shopping-cart"></i><span class="badge">{{Session::has('cart') ? Session::get('cart')->qty : '0'}}</span> winkelwagen</a></li>
    </ul>
</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">

    @foreach($categories as $category)
        <a href="{{route('giftcards', str_replace(' ', '-', $category->name))}}"><img class="img-circle" style="height: 25px;" src="/img/icon/{{$category->icon}}"></a>
    @endforeach
<span class="pull-right" style="color: #eeeeee;">direct geleverd per mail 24/7</span>
</div>