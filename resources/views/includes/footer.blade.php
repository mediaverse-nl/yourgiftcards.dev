<div class="footer-basic-centered" style="height: 100%;">
    <div class="container" >
        <div class="col-lg-12" style="color: #F59D00">

            <div class="col-lg-4">
                <h2 style="font-size: 18px;">@lang('text.tag_general')</h2>
                <ul>
                    <li><a href="{{route('algemeen.voorwaarden')}}">@lang('button.terms')</a></li>
                    <li><a href="{{route('disclaimer')}}">@lang('button.disclaimer')</a></li>
                    <li><a href="{{route('privacy')}}">@lang('button.privacy')</a></li>
                    <li><a href="{{route('refund')}}">@lang('button.return_policy')</a></li>
                    <li><a href="{{route('guide')}}">@lang('text.title_guide')</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h2 style="font-size: 18px;">Social media</h2>
                <ul>
                    <li>
                        <a href="#">facebook</a>
                        <div
                                class="fb-like"
                                data-share="true"
                                data-width="450"
                                data-show-faces="true">
                        </div>
                    </li>
                    <li><a href="#">twitter</a></li>
                    <li><a href="#">google+</a></li>
                    <li><a href="#">tumblr</a></li>

                </ul>
            </div>

            <div class="col-lg-5">
                <h2 style="font-size: 18px;">@lang('text.latest_news')</h2>
                <hr>
                <a href="{{route('blog.show', str_replace(' ', '-', $nieuws->title))}}">
                    <img class="col-lg-5" style="height: 70px;" src="/img/blog/{{$nieuws->image}}"><br>
                </a>
                <div class="col-lg-7">
                    <h3 style="font-size: 14px; margin-top: -20px;">{{$nieuws->title}}</h3>
                    <p style="font-size: 12px; color: #F7F7F7;">{{str_limit($nieuws->text, 60, '... ')}}<br> <a href="{{route('blog.show', str_replace(' ', '-', $nieuws->title))}}">@lang('button.read_more')</a></p>
                </div>

            </div>

            <div class="col-lg-12">
                <span id="copyright text-right center-block">© Copyright 2015 yourgiftcard </span>
                <span class="pull-right">A Mediaverse.nl Company</span>
            </div>

        </div>
        <div class="col-lg-12">

        </div>
    </div>
</div>
