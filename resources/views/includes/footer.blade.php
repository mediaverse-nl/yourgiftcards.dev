<div class="footer-basic-centered" style="height: 100%; border-top: 1px dashed #eee; background-color: #2B3E51;">
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
                        <a href="https://www.facebook.com/Justgiftcardsnl-214283949025796/?fref=ts">facebook </a><br>
                        <div class="fb-like"
                         data-href="https://www.facebook.com/Justgiftcardsnl-214283949025796/?fref=ts"
                         data-layout="button"
                         data-action="like"
                         data-size="small"
                         data-show-faces="true"
                         data-share="true"></div>
                    </li>
                    <li style="padding: 5px 0px;">
                        <a>twitter</a><br>
                        <a href="https://twitter.com/justgiftcardsNL" class="twitter-follow-button" data-show-count="false">Follow @justgiftcardsNL</a>
                        <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],
                                    p=/^http:/.test(d.location)?'http':'https';
                                if(!d.getElementById(id)){
                                    js=d.createElement(s);js.id=id;
                                    js.src=p+'://platform.twitter.com/widgets.js';
                                    fjs.parentNode.insertBefore(js,fjs);
                                }}(document, 'script', 'twitter-wjs');
                        </script>


                    </li>
                    {{--<li><a href="#">google+</a></li>--}}
                    {{--<li><a href="#">tumblr</a></li>--}}

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

            <div class="col-lg-12" style="margin-top: 40px;">
                <span id="copyright text-right center-block">© Copyright 2015 Justgiftcards </span>
                <span class="pull-right"> <a style="color: #FFA50A" href="http://mediaverse.nl/">Mediaverse.nl</a> Company</span>
            </div>

        </div>
    </div>
</div>
