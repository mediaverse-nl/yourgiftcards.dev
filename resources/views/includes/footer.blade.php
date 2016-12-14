<div class="footer-basic-centered" style="height: 100%;">
    <div class="container" >
        <div class="col-lg-12" style="color: #F59D00">

            <div class="col-lg-4">
                <h2 style="font-size: 18px;">Algemeen</h2>
                <ul>
                    <li><a href="{{route('algemeen.voorwaarden')}}">Terms and Conditions</a></li>
                    <li><a href="{{route('disclaimer')}}">Disclaimer</a></li>
                    <li><a href="{{route('privacy')}}">Privacy</a></li>
                    <li><a href="{{route('refund')}}">Return Policy</a></li>
                    <li><a href="{{route('guide')}}">handleidingen</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h2 style="font-size: 18px;">Social media</h2>
                <ul>
                    <li><a href="#">facebook</a></li>
                    <li><a href="#">twitter</a></li>
                    <li><a href="#">google+</a></li>
                    <li><a href="#">tumblr</a></li>
                </ul>
            </div>

            <div class="col-lg-5">
                <h2 style="font-size: 18px;">Latest news</h2>
                <hr>
                <a href="{{route('blog.show', str_replace(' ', '-', $nieuws->title))}}">
                    <img class="col-lg-5" style="height: 70px;" src="/img/blog/{{$nieuws->image}}"><br>
                </a>
                <div class="col-lg-7">
                    <h3 style="font-size: 14px; margin-top: -20px;">{{$nieuws->title}}</h3>
                    <p style="font-size: 12px; color: #F7F7F7;">{{str_limit($nieuws->text, 60, '... ')}}<br> <a href="{{route('blog.show', str_replace(' ', '-', $nieuws->title))}}">Read More</a></p>
                </div>
            </div>

            <div class="col-lg-12">
                <span id="copyright text-right center-block">© Copyright 2015 yourgiftcard </span>
                <span class="pull-right">A Mediaverse.nl Company</span>
            </div>

        </div>
    </div>
</div>
