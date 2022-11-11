<header role="banner" class="probootstrap-header">
    <!-- <div class="container"> -->
    <div class="row">
{{--        <a href="index.html" class="probootstrap-logo visible-xs"><img src="{{asset('frontend/img/logo_sm.png')}}" class="hires" width="120" height="33" alt="Free Bootstrap Template by uicookies.com"></a>--}}

        <a href="#" class="probootstrap-burger-menu visible-xs"><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs" >
            <ul class="probootstrap-main-nav">
{{--                <li class="hidden-xs probootstrap-logo-center"><a href="{{url('/')}}">--}}
{{--                        <img src="{{asset('frontend/img/logo_md.png')}}" class="hires" width="181" height="50" alt=""></a></li>--}}

                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('frontend.index')}}">Mission</a></li>
                <li><a href="{{route('frontend.tracking')}}">Track</a></li>
                <li><a href="{{route('frontend.contact')}}">Contact Us</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
            <div class="extra-text visible-xs">
                <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
                <h5>Connect With Us</h5>
                <ul class="social-buttons">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook2"></i></a></li>
                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                </ul>
            </div>
        </nav>
{{--        <div class="demo" style="float: right;margin-right: 2rem">--}}
{{--            <div>--}}
{{--                <table class="lang">--}}
{{--                    <tr>--}}
{{--                        <td class="tdlang">--}}
{{--                            <span id="en" class="button_lang current_lang">EN</span>--}}
{{--                        </td>--}}
{{--                        <td class="tdlang"><span id="bn" class="button_lang">বাং</span></td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- </div> -->
</header>
