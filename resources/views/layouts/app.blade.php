<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="http://avtoshkolabg.com/">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{{ asset('/favicon.ico') }}}">
    <title>Успех-79</title>

    <!-- Styles -->
    <link href="js/library/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/libraries/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Magnific Popup core CSS file -->
    <link  href="js/library/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="js/library/clndr/css/clndr.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="js/library/needim/noty/lib/noty.css" rel="stylesheet">

    <script src="js/library/jquery/jquery-3.2.1.js"></script>
    <script src="js/usp_app.js"></script>
    <script src="js/library/underscore/underscore.js"></script>
    <script src="js/library/needim/noty/lib/noty.js"></script>
    <script src="js/library/slider/js/app.js"></script>
    <script src="js/library/slider/js/jssor.slider-23.1.6.min.js"></script>
    <script src="js/library/isotope/isotope.pkgd.min.js"></script>
    <script src="js/library/bootstrap/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="js/library/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/library/classyloader/jquery.classyloader.min.js"></script>
    <script src="js/library/jquery/jquery-ui.min.js"></script>
    <script src="js/library/moment/moment.js"></script>
    <script src="js/library/moment/bg.js"></script>
    <script src="js/library/clndr/src/clndr.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-104555267-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div id="fb-root"></div>
<script>

(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1421278344834781";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    $(document).ready(function () {

        // JavaScript
        window.sr = ScrollReveal();
        sr.reveal('.reveal');
    })
	
</script>


<div id="app">
    @yield('mainmenu')
    @yield('slider')
    @yield('content')
    @yield('footer')
    @yield('javascript')
</div>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
