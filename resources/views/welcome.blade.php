@extends('layouts.app')

@section('content')
  
    <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">
            <div data-thumb="/images/slider-1.jpg" data-src="/images/slider-1.jpg">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to our</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">CLEAN, MODERN, MULTIPURPOSE THEME</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">Our team of professionals will help you turn your dream home or flat into a reality fast. The Love Boat promises something for everyone. Now the world don't move to the beat of just one</p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                   </div>
                </div>
            </div>
            <div data-thumb="/images/slider-2.jpg" data-src="/images/slider-2.jpg">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to our</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">CLEAN ,MODERN, MULTIPURPOSE THEME</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">Our team of professionals will help you turn your dream home or flat into a reality fast. The Love Boat promises something for everyone. Now the world don't move to the beat of just one</p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Slider area -->

    <!-- Professional Builde -->
    <section class="professional_builder row">
        <div class="container">
           <div class="row builder_all">
               @if($cat=\App\Models\Category::where('slug','services')->first())
                @foreach($cat->Chields as $c)
                    <div class="col-md-4 col-sm-6 builder">
                        <i class="fa {{$c->icon}}" aria-hidden="true"></i>
                        <h4>{{$c->title}}</h4>
                        {!! $c->description !!}
                    </div>
                @endforeach
               @endif
           </div>
        </div>
    </section>
    <!-- End Professional Builde -->

    <!-- About Us Area -->
    <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                @if($page=Func::getPageBySlug('about-us'))
                    <h2>{{ $page->title}}</h2>
                    <h4>{!! str_limit($page->body, 450,"") !!}</h4>
                @endif
            </div>
            @if($page=Func::getPageBySlug('who-we-are'))
            <div class="row about_row">
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h2>{{ $page->title}}</h2>
                    </div>
                    {!! str_limit($page->body, 450,"") !!}
                    <a href="#" class="button_all">Contact Now</a>
                </div>
                <div class="col-md-5 col-sm-6 about_client">
                    <img src="/images/about_client.jpg" alt="">
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- End About Us Area -->

    <!-- What ew offer Area -->
<!--
    <section class="what_we_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>WHAT WE OFFER</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="row construction_iner">
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="/images/cns-1.jpg" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <a href="#">BUILDING CONSTRUCTION</a>
                        <p>Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
                   </div>
                </div>
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="/images/cns-2.jpg" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-keyboard-o" aria-hidden="true"></i>
                        <a href="#">PROJECT PLANNING</a>
                        <p>Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
                   </div>
                </div>
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="/images/cns-3.jpg" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-gavel" aria-hidden="true"></i>
                        <a href="#">HOUSE RENOVATION</a>
                        <p>Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
                   </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- End What ew offer Area -->

    <!-- Our Services Area --> 
    @if($cat=\App\Models\Category::where('slug','services')->first())
    <section class="our_services_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our {{ $cat->title }}</h2>
                <h4>{!! str_limit($cat->description, 450,"") !!}</h4>
            </div>
            <div class="portfolio_inner_area">
                <div class="portfolio_filter">
                    <ul>
                        <li data-filter="*" class="active"><a href=""> All</a></li>
                        @foreach($cat->Chields as $c)
                        <li data-filter=".{{$c->slug}}"><a href="">{{$c->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="portfolio_item">
                   <div class="grid-sizer"></div>
                   @foreach($cat->Chields as $c)
                   @foreach($c->Posts()->orderBy('id','desc')->limit(6)->get() as $p)
                    <div class="single_facilities col-xs-4 p0 {{$c->slug}}">
                       <div class="single_facilities_inner">
                          	<img src="{{$p->mainImage()}}" alt="{{$p->title}}" class="img-responsive center-block" 
                                 style="height: 380px;width: 100%;">
                            <div class="gallery_hover">
                                <h4>{{$p->title}}</h4>
                                <ul>
                                    <li><a href="{{route('getPostServicesBySlug', $p->slug) }}">
                                        <i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    
    <!-- End Our Services Area -->

    <!-- Our Latest Blog Area -->
    <section class="latest_blog_area">
        <div class="container">
            @if($cat=\App\Models\Category::where('slug','blog')->first())
                <div class="tittle wow fadeInUp">
                    <h2>Our Latest {{ $cat->title }}</h2>
                    <h4>{!! str_limit($cat->description, 450,"") !!}</h4>
                </div>
                <div class="row latest_blog">
                    @foreach($cat->Posts()->orderBy('id','asc')->limit(3)->get() as $post)
                    <div class="col-md-4 col-sm-6 blog_content">
                        <img src="{{$post->mainImage()}}" alt="{{$post->title}}">
                        <a href="#" class="blog_heading">{{$post->title}}</a>
                        <h4><small>by  </small>{{ $post->Creator!=null?$post->Creator->name:null }}
                            <span>/</span><small>ON </small> {{ $post->created_at!=null?$post->created_at->toDateString():'' }}</h4>
                        {!! str_limit($post->body, 200) !!} <p style="padding-top:10px;"><a href="{{route('getPostBySlug', $post->slug) }}">Read More</a></p>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- End Our Latest Blog Area -->

    <!-- Our Partners Area -->
    <section class="our_partners_area">
        <div class="container">
        @if($cat=\App\Models\Category::where('slug','Partners')->first())
            <div class="tittle wow fadeInUp">
                <h2>Our {{ $cat->title }}</h2>
                <h4>{!! str_limit($cat->description, 450,"") !!}</h4>
            </div>
            <div class="partners">
                @foreach($cat->Posts()->orderBy('id','desc')->limit(10)->get() as $post)
                <div class="item"><img src="{{$post->mainImage()}}" alt="{{$post->title}}"></div>
                @endforeach
            </div>
        @endif
        </div>
        <div class="book_now_aera">
            <div class="container">
                <div class="row book_now">
                    <div class="col-md-10 booking_text">
                        <h4>Booking now if you need build your dream home.</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-md-2 p0 book_bottun">
                        <a href="{{route('contactus', 'contact-us') }}" class="button_all">book now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Partners Area -->

@endsection
