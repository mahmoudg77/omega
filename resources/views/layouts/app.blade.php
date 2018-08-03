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
    <title>@yield('title',Setting::getIfExists('site_name','SFECE'))</title>
{{--@yield('title', 'SFECE')--}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Jomhuria|Tajawal" rel="stylesheet">
    <link href="{{ asset('css/front-end.css') }}" rel="stylesheet">

    @if(app()->getLocale()=='ar')
        <!-- Load Bootstrap RTL theme from RawGit -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css')}}">
        <link href="{{ asset('css/front-end-rtl.css') }}" rel="stylesheet">
    @endif

    {{--<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">--}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/camera.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">



    @yield('css')

</head>
<body dir="{{(app()->getLocale()=='ar')?'rtl':'ltr'}}">
    
<div id="app">

<div class="container">
    <div class="row" style="background-color: #eee">
        <div class="header-top">
            <div class="pull-{{(app()->getLocale()=='ar')?'right':'left'}}">
              <ul class="list-inline">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}" class="site-login">
                        <i class="fa fa-user"></i> {{trans('app.login')}}</a></li>
                    @if(Setting::getIfExists('allow_register',false))
                      <li><a href="{{ route('register') }}" class="site-login">
                        <i class="fa fa-user-plus"></i> {{trans('app.register')}}</a></li>
                      @endif
                @else
                    <li><a href="#" class=""><i class="fa fa-btn fa-user"></i> {{ Auth::user()->name }}</a></li>
                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">{{trans('app.logout')}}</a>
					  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						  {{ csrf_field() }}
					  </form>
				  </li>
                    <li><a href="{{ route('cp.dashboard') }}" >{{trans('app.control panel')}}</a></li>

                @endif
                    @if(Setting::getIfExists('allow_add_research',false))
                    <li>
                      @if(Auth::guest())
                        <a href="{{ route('login') }}">{{trans('app.request research')}}</a>
                      @else
                        <a href="#" data-toggle="modal" data-target="#myModal">{{trans('app.request research')}}</a>
                      @endif
                  </li>
                    @endif
                  <li><a href="{{ route('getPostBySlug', 'head_institution') }}" class="">{{trans('app.head institution')}}</a></li>
              </ul>
            </div>
            <div class="pull-{{(app()->getLocale()=='ar')?'left':'right'}}">
                <div class="social-media">
                    <a href="{{route('swichlang')}}">{{(app()->getLocale()=='ar')?'English':'عربي'}}</a>
                    @foreach(Func::menu('header-social') as $link)
                        <a href="{{ Func::menuLink($link)}}" target="_blank">
                            {!! $link->title !!}
                        </a>
                    @endforeach
                </div>
            </div>
          </div>
          <div class="clear-fix"></div>
          <div class="header">
              <div class="col col-xs-12" style="margin-top:80px;">

                  <div style="padding: 10px;" class="pull-{{(app()->getLocale()=='ar')?'right':'left'}}">
                      <a href="{{route('home')}}">   <img src="{{ asset('images/logo.png') }}" alt="" title="" class="" style="width: 120px;"></a>
                  </div>
                  <div class="header-title pull-{{(app()->getLocale()=='ar')?'right':'left'}}">
                      <a href="{{route('home')}}"  style="text-decoration: none">
                      <h1 >{{Setting::getIfExists('site_name','المؤسسة العلمية للطفولة المبكرة')}}</h1>
                      <small>{{Setting::getIfExists('site_slogan','تثقيف وتقديم الاستشارات إلى أولياء الأمور والمعلمات والمختصين في مجال تربية الطفولة المبكرة')}}</small>
                      </a>
                  </div>

              </div>
          </div>
          <div class="clearfix"></div>
        <nav class="navbar navbar--default navbar-static-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">SFECE</a> -->
                </div>

                <div class="collapse navbar-collapse pull-{{(app()->getLocale()=='ar')?'right':'left'}}" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-{{(app()->getLocale()=='ar')?'right':'left'}}">
                        @foreach(Func::menu('main') as $link)
                                    {!!  Func::drowMenuLink($link)!!}
                         @endforeach
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <div style="clear:both;display:block">
        <!-- Footer -->
        <footer>
            <div class="r-ow footer">
                <div class="container">
                <div class="col-sm-4">
                    <h4>{{trans('app.categories')}}</h4>
                    <ul class="li-st-inline" style="list-style: none;">
                        @foreach(Func::menu('footer') as $link)
                                    {!!  Func::drowMenuLink($link)!!}
                         @endforeach
                    </ul>
                </div>
                <div class="col-sm-4">
                    @if($page=Func::getPageBySlug('toasl-maana'))
                        <h4>{{ $page->title}}</h4>
                        {!! $page->body !!}
                    @endif
                </div>
                <div class="col-sm-4">
                    @if(Setting::getIfExists('show_fb_posts_footer',false))
                    <h4>{{trans('app.follow facebook')}}</h4>
                    <div class="fb-page" data-href="{{Setting::getIfExists('facebook','https://www.facebook.com/sffece/')}}"
                         data-small-header="false" data-adapt-container-width="true" 
                         data-hide-cover="false" data-show-facepile="false">
                        <blockquote cite="{{Setting::getIfExists('facebook','https://www.facebook.com/sffece/')}}" class="fb-xfbml-parse-ignore"></blockquote>
                    </div>
                    @endif
                </div>
                </div>
            </div>
            <div class="footer-copyright">
                <p class="m-0 text-center text-white">&copy; {{ trans('app.Copyright') }} 
                    <a href="http://www.web-egy.com/" target="_blank" style="color:#ccc;text-decoration:none;"> WebEgypt </a></p>
            </div>
        </footer>
    </div>
</div>
@if(Setting::getIfExists('allow_add_research',false))
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{trans('app.request research')}}</h4>
      </div>
        {{Form::model(null, ['route'=>["cp.posts.store",'type'=>3], "method"=>"POST", "enctype"=>"multipart/form-data", "class"=>"ajax-form"])}}
      <div class="modal-body">
          <div class="form-horizontal">
          @foreach(config('translatable.locales') as $key)
                <div class="form-group">
                    <label class="control-label col-md-3">{{ trans('app.title') }} ({{$key}})</label>
                    <div class="col-md-9">
                      {{Form::text($key."[title]","",["required",'class'=>'form-control'])}}
                    </div>
                </div>
          @endforeach
          @foreach(config('translatable.locales') as $key)
                <div class="form-group">
                    <label class="control-label col-md-3">{{ trans('app.content') }} ({{$key}})</label>
                    <div class="col-md-9">
                      {{Form::textarea($key."[body]","",["required",'class'=>'form-control','style'=>'height:120px'])}}
                    </div>
                </div>
          @endforeach

            {{Form::hidden('post_type_id',3)}}
                <div class="form-group">
                    <label class="control-label col-md-3">{{ trans('app.category') }}</label>
                    <div class="col-md-9">
                        {{Form::select("category_id",App\Models\Category::listsTranslations('title')->where('parent_id',2)->pluck('title','id'),null,["required",'class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">{{ trans('app.attach') }}</label>
                    <div class="col-md-9">
                        {{Form::file("attach",['accept'=>'.pdf,.doc,.docx,.xls,.xlsx'])}}
                    </div>
                </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success create">
                            <i class="fa fa-save"></i> {{ trans('app.save') }}</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('app.close') }}</button>
          </div>
      </div>
      {{Form::close()}}
    </div>
  </div>
</div>
@endif
 </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/camera.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
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
    
    <script>
        $(function(){
             $('#camera_wrap_1').camera({
                thumbnails: true,
                height: '400px',
            });
        });
    </script>
    <?php if(session()->has('response')){
        $response=session()->pull('response');
    }?>
    @if(isset($response) && $response['type']=='success')
        <script>$(function(){alert("{{$response['message']}}");});</script>
    @endif
    @if(isset($response) && $response['type']=='error')
        <script>$(function(){alert("{{$response['message']}}");});</script>
    @endif
    <script>
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
  </script>





</body>

</html>
