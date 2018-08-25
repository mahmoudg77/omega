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
               @if (count($categoryServices)>0)
               @foreach($categoryServices as $service)
                    <div class="col-md-4 col-sm-6 builder">
                        <i class="fa {{$service->icon}}" aria-hidden="true"></i>
                        <img src="{{$service->mainImage()}}"/>
                        <h4>{{$service->title}}</h4>
                        {!! $service->description !!}
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
    <section class="our_services_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Services</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="portfolio_inner_area">
                <div class="portfolio_filter">
                    <ul>
                        <li data-filter="*" class="active"><a href=""> All</a></li>
                        <li data-filter=".photography"><a href="">ARCHITECTURE</a></li>
                        <li data-filter=".branding"><a href="">Building</a></li>
                        <li data-filter=".webdesign"><a href="">CONSTRUCTION</a></li>
                        <li data-filter=".adversting"><a href="">DESIGN</a></li>
                        <li data-filter=".painting"><a href="">Painting</a></li>
                    </ul>
                </div>
                <div class="portfolio_item">
                   <div class="grid-sizer"></div>
                    <div class="single_facilities col-xs-4 p0 painting photography adversting">
                       <div class="single_facilities_inner">
                          	<img src="/images/gallery/sv-1.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 webdesign">
                       <div class="single_facilities_inner">
                          	<img src="/images/gallery/sv-2.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 painting p0 photography branding">
                       <div class="single_facilities_inner">
                          	<img src="/images/gallery/sv-3.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 adversting webdesign adversting">
                       <div class="single_facilities_inner">
                          	<img src="/images/gallery/sv-4.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 painting adversting branding">
                       <div class="single_facilities_inner">
                          	<img src="/images/gallery/sv-5.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 webdesign photography magazine adversting">
                       <div class="single_facilities_inner">
                          	<img src="/images/gallery/sv-6.jpg" alt="">
                            <div class="gallery_hover">
                                <h4>Construction</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Services Area -->

    <!-- Our Team Area -->
<!--
    <section class="our_team_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Team</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="row team_row">
                <div class="col-md-3 col-sm-6 wow fadeInUp">
                   <div class="team_membar">
                        <img src="/images/team/tm-1.jpg" alt="">
                        <div class="team_content">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="#" class="name">Prodip Ghosh</a>
                            <h6>Founder &amp; CEO</h6>
                        </div>
                   </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                   <div class="team_membar">
                        <img src="/images/team/tm-2.jpg" alt="">
                        <div class="team_content">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="#" class="name">Emran Khan</a>
                            <h6>Web-Developer</h6>
                        </div>
                   </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                   <div class="team_membar">
                        <img src="/images/team/tm-3.jpg" alt="">
                        <div class="team_content">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="#" class="name">Prodip Ghosh</a>
                            <h6>Founder &amp; CEO</h6>
                        </div>
                   </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                   <div class="team_membar">
                        <img src="/images/team/tm-4.jpg" alt="">
                        <div class="team_content">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="#" class="name">Jakaria Khan</a>
                            <h6>Founder &amp; CEO</h6>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- End Our Team Area -->

    <!-- Our Latest Blog Area -->
    <section class="latest_blog_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                
                <h2>Our Latest Blog</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="row latest_blog">
                @if (count($postsByCat)>0)
                @foreach($postsByCat as $post)
                    <div class="col-md-4 col-sm-6 blog_content">
                        <img src="{{$post->mainImage()}}" alt="">
                        <a href="#" class="blog_heading">{{$post->title}}</a>
                        <h4><small>by  </small>{{ $post->Creator!=null?$post->Creator->name:null }}
                            <span>/</span><small>ON </small> {{ $post->created_at!=null?$post->created_at->toDateString():'' }}</h4>
                        {!! str_limit($post->body, 200) !!} <p style="padding-top:10px;"><a href="{{route('getPostBySlug', $post->slug) }}">Read More</a></p>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Our Latest Blog Area -->

    <!-- Our Partners Area -->
    <section class="our_partners_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Partners</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="partners">
                <div class="item"><img src="/images/client_logo/client_logo-1.png" alt=""></div>
                <div class="item"><img src="/images/client_logo/client_logo-2.png" alt=""></div>
                <div class="item"><img src="/images/client_logo/client_logo-3.png" alt=""></div>
                <div class="item"><img src="/images/client_logo/client_logo-4.png" alt=""></div>
                <div class="item"><img src="/images/client_logo/client_logo-5.png" alt=""></div>
            </div>
        </div>
        <div class="book_now_aera">
            <div class="container">
                <div class="row book_now">
                    <div class="col-md-10 booking_text">
                        <h4>Booking now if you need build your dream home.</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-md-2 p0 book_bottun">
                        <a href="#" class="button_all">book now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Partners Area -->

@endsection
