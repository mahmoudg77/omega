@if(!request()->ajax())
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description',Setting::getIfExists('site_desc'))">
    <meta name="keywords" content="@yield('keywords',Setting::getIfExists('site_key'))" />
    <meta name="author" content="@yield('author', 'SFECE')" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">
    <!-- Open Graph data -->
    <meta property="og:title" content="@yield('title', 'SFECE')" />
    <meta property="og:type" content="@yield('type', 'Article')" />
    <meta property="og:url" content="@yield('url', request()->url())" />
    <meta property="og:image" content="@yield('image', asset('images/logo.png'))" />
    <meta property="og:description" content="@yield('description',Setting::getIfExists('site_desc'))" />
    @if(Setting::getIfExists('fb_app_id'))
    <!-- Facebook -->
    <meta property="fb:app_id" content="{{Setting::getIfExists('fb_app_id')}}" />
    @endif
    @foreach(explode(',',Setting::getIfExists('fb_admins')) as $admin)
        <meta property="fb:admins" content="{{$admin}}"/>
    @endforeach
    <title>@yield('title',Setting::getIfExists('site_name','Omega'))</title>
    {{--@yield('title', 'SFECE')--}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jomhuria|Tajawal" rel="stylesheet">

    <!-- Favicon -->
    <!-- <link rel="icon" href="images/favicon.png" type="image/x-icon" /> -->
    <!-- Animate CSS -->
    <link href="{{ asset('vendors/animate/animate.css') }}" rel="stylesheet">
    <!-- Icon CSS-->
	<!--<link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">-->
	    <link href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" rel="stylesheet">

    <!-- Camera Slider -->
    <link rel="stylesheet" href="{{ asset('vendors/camera-slider/camera.css') }}">
    <!-- Owlcarousel CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl_carousel/owl.carousel.css') }}" media="all">
    <!--Theme Styles CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="all" />

    @if(app()->getLocale()=='ar')
        <!-- Load Bootstrap RTL theme from RawGit -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css')}}">
        <link href="{{ asset('css/style-rtl.css') }}" rel="stylesheet">
    @endif

    {{--<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">--}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    @yield('css')

</head>
<body dir="{{(app()->getLocale()=='ar')?'rtl':'ltr'}}">
    
<div id="app">
<!-- Preloader -->
<div class="preloader"></div>

<!-- Top Header_Area -->
<section class="top_header_area">
    <div class="container">
        <ul class="nav navbar-nav top_nav">
            <li><a href="#"><i class="fa fa-phone"></i>{{\App\Models\Setting::getIfExists('site_phone')}}</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i>{{\App\Models\Setting::getIfExists('emails_default')}}</a></li>
            <li class="hidden-xs"><a href="#"><i class="fa fa-clock-o"></i>{{date("Y M d H:n")}}</a></li>
            {{--Mon - Sat 12:00 - 20:00--}}
        </ul>

        <ul class="nav navbar-nav navbar-{{(app()->getLocale()=='ar')?'left':'right'}} social_nav">
            @foreach(Func::menu('header-social') as $sl)
                {!!  Func::drowMenuLink($sl)!!}
            @endforeach
            <!--<li><a href="{{route('swichlang')}}">{{(app()->getLocale()=='ar')?'EN':'ع'}}</a></li>-->
        </ul>
    </div>
</section>
<!-- End Top Header_Area -->

<!-- Header_Area -->
<nav class="navbar navbar-default header_aera" id="main_navbar">
    <div class="container">
        <!-- searchForm -->
        <div class="searchForm">
            <form action="/{{app()->getLocale()}}" class="row m0">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                    <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div><!-- End searchForm -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-2 p0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-10 p0">
            <div class="collapse navbar-collapse" id="min_navbar">
                <ul class="nav navbar-nav navbar-{{(app()->getLocale()=='ar')?'left':'right'}}">
                    @foreach(Func::menu('main') as $link)
                        {!!  Func::drowMenuLink($link)!!}
                    @endforeach
                    <li class="menu--home">
                        <!--<a href="#" class=""><i class="fa fa-home"></i></a>-->
                        <a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container -->
</nav>
<!-- End Header_Area -->
@endif

@yield('content')

@if(!request()->ajax())
<!-- Footer Area -->
<footer class="footer_area" style="border-top: 4px solid #e71d1d;">
        <div class="container">
            <div class="footer_row row">
                <div class="col-md-4 col-sm-6 footer_about">
                    <!--<h2>ABOUT OUR COMPANY</h2>-->
                    <img src="/images/logofooter.png" alt="">

                    <!--<p>{{Setting::getIfExists('site_desc','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.')}}</p>-->

                    <ul class="socail_icon">
                        @foreach(Func::menu('social_links_footer') as $link)
                            {!!  Func::drowMenuLink($link)!!}
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 footer_about quick">
                    <h2>{{trans('app.quick-links')}}</h2>
                    <ul class="quick_link">
                        @foreach(Func::menu('quick_links_footer') as $link)
                            {!!  Func::drowMenuLink($link)!!}
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 footer_about">
                    <h2>{{trans('app.contact-us')}}</h2>
                    <address>
                        <p>{{trans('app.questions')}}:</p>
                        <ul class="my_address">
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>{{Setting::getIfExists('emails_default','info@omegaegy.net')}}</a></li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>{{Setting::getIfExists('site_phone','+202 2795 1402')}}</a></li>
                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{Setting::getIfExists('site_address','17 Magles El Shaab St. Lazogly Square Cairo, Egypt')}} </span></a></li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
        <div class="copyright_area">
            Copyright 2018 All rights reserved. Designed by <a href="https://web-egy.com">Web Egypt.</a>
        </div>
    </footer>
    <!-- End Footer Area -->

</div>

    <!-- jQuery JS -->
    <script src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Animate JS -->
    <script src="{{ asset('vendors/animate/wow.min.js') }}"></script>
    <!-- Camera Slider -->
    <script src="{{ asset('vendors/camera-slider/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('vendors/camera-slider/camera.min.js') }}"></script>
    <!-- Isotope JS -->
    <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <!-- Progress JS -->
    <script src="{{ asset('vendors/Counter-Up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendors/Counter-Up/waypoints.min.js') }}"></script>
    <!-- Owlcarousel JS -->
    <script src="{{ asset('vendors/owl_carousel/owl.carousel.min.js') }}"></script>
    <!-- Stellar JS -->
    <script src="{{ asset('vendors/stellar/jquery.stellar.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('js/theme.js') }}"></script>
    
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    @yield('js')

    @if(Setting::getIfExists('fb_app_id','')!='')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.0&appId={{Setting::getIfExists('fb_app_id','255524131659994')}}&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    @endif
    
    <!-- <script>
        $(function(){
             $('#camera_wrap_1').camera({
                thumbnails: true,
                height: '400px',
            });
        });
    </script> -->
    <?php if(session()->has('response')){
        $response=session()->pull('response');
    }?>
    @if(isset($response) && $response['type']=='success')
        <script>$(function(){alert("{{$response['message']}}");});</script>
    @endif
    @if(isset($response) && $response['type']=='error')
        <script>$(function(){alert("{{$response['message']}}");});</script>
    @endif
    <!-- <script>
        wow = new WOW(
          {
            animateClass: 'animated',
            offset:       100,
            callback:     function(box) {
              console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
          }
        );
        wow.init();
        document.getElementById('moar').onclick = function() {
          var section = document.createElement('section');
          section.className = 'section--purple wow fadeInDown';
          this.parentNode.insertBefore(section, this);
        };
  </script> -->
</body>
</html>
@endif