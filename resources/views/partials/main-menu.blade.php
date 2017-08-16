<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-static-top black-top-menu">
        <div class="container">
            <div id="social-icons" class="col-md-6">
                {{--<div>--}}
                {{--<a href="facebook.com">--}}
                {{--<img src="css/icons/facebook.svg" class="top-icons">--}}
                {{--<span>Facebook</span>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div>--}}
                {{--<a href="google.com">--}}
                {{--<img src="css/icons/google.svg" class="top-icons">--}}
                {{--<span>Google</span>--}}
                {{--</a>--}}
                {{--</div>--}}
            </div>
            <div id="contacts-top" class="navbar-right">

                <span class="blink-me">
                <i class="fa fa-phone"></i>
                Обадете се сега! Telenor: 0898 803 052; Mtel: 0988 917 605
            </span>
                <span>&nbsp;</span>

                <span>
                    <i class="fa fa-envelope"></i>
                uspeh79.office@gmail.com
            </span>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default navbar-static-top menu-animation">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{--{{ config('app.name', 'Успех-79') }}--}}
                    <img src="css/icons/logo-part1.png" id="logocar">
                    <img src="css/icons/logo-part2.png" id="logotext">
                    {{--<img src="css/icons/logo.png" width="width: 262px;" style="margin-top: -72px">--}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('news')}}">Новини</a></li>

                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" data-toggle="dropdown">Курсове <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('category-a')}}">Категория "А"</a></li>
                            <li><a href="{{route('category-a1')}}">Категория "А1"</a></li>
                            <li><a href="{{route('category-a2')}}">Категория "А2"</a></li>
                            <li><a href="{{route('category-b')}}">Категория "B"</a></li>
                            <li><a href="{{route('categorybe')}}">Категория "B+Е"</a></li>
                            <li><a href="{{route('category-c')}}">Категория "C"</a></li>
                            <li><a href="{{route('category-d')}}">Категория "D"</a></li>
                            <li><a href="{{route('prof')}}">Професионална компетентност</a></li>
                            <li><a href="{{route('adr')}}">"ADR" Превоз на опасни товари</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" data-toggle="dropdown">Цени <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('prices')}}">Цени - Курсове за водачи</a></li>
                            <li><a href="{{route('prices-qualified-courses')}}">Цени - Квалификационни курсове</a></li>

                        </ul>
                    </li>

                    <li><a href="{{route('gallery')}}">Галерия</a></li>
                    <li><a href="{{route('about-us')}}">За нас</a></li>
                    <li><a href="{{route('contacts')}}">Контакти</a></li>
                    {{--<!-- Authentication Links -->--}}
                    @if (Auth::guest())
                        {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('administrator-welcome') }}">
                                        Административен панел
                                    </a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>


<script>

    $(document).ready(function () {


        $('.menu-animation').css({
            'background-color': '',
            'position': 'fixed',
            'width': '100%',
            'font-size': '16px',
            'top': '30px'
        });

        let moveChecker = false
        animationFunction();
//        moveChecker = false;

        $(window).scroll(function () {
            animationFunction();
        });


        function animationFunction() {

            checher = moveChecker;
            let menuposition = $('.menu-animation').offset().top;

            if (menuposition > 30 && checher == false) {
                $('#logocar').hide("slide", {direction: "up"}, 500);
                $('#logotext').animate({
                    width: '300px',
                    'margin-top': '-65px'
                });
                moveChecker = true;
                $('.menu-animation').animate({
                    'top': '0px',
                    'height': '50px',
                    'font-size': '14px'
                })
            } else if (menuposition <= 15 && checher == true) {

                console.log(menuposition);
                $('#logocar').show("slide", {direction: "up"}, 500);
                $('#logotext').animate({
                    width: '328px',
                    'margin-top': '-72px'
                });
                $('#logotext').show();
                moveChecker = false;
                $('.menu-animation').animate({
                    'top': '30px',
                    'font-size': '16px'
                })
            }
        }


    })
</script>
