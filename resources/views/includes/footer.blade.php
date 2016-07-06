<div class="footer-basic-centered" style="height: 100%;">
    <div class="container" >
        <div class="col-lg-12" style="color: #F59D00">

            <div class="col-lg-4">
                <ul>
                    <li><a href="">algemene voorwaarden</a></li>
                    <li><a href="">Disclaimer</a></li>
                    <li><a href="">Privacy</a></li>
                    <li><a href="">return</a></li>
                    <li><a href="">handleidingen</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <ul>
                    <li><a href="#">facebook</a></li>
                    <li><a href="#">twitter</a></li>
                    <li><a href="#">google+</a></li>
                    <li><a href="#">tumblr</a></li>
                </ul>
            </div>

            <div class="col-lg-4 table-bordered">
                <a href="{{route('blog.show', str_replace(' ', '-', $nieuws->title))}}">
                    <img style="height: 120px;" src="/img/blog/{{$nieuws->image}}"><br>
                    <span>{{$nieuws->title}}</span>
                    <p>{{$nieuws->text}}</p>
                </a>
            </div>

            <div class="col-lg-12">
                <div id="copyright text-right center-block">© Copyright 2013 yourgiftcard </div>
            </div>

        </div>
    </div>
</div>
