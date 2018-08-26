@extends('layouts.app')

@section('title'){{ $title }}@endsection
@section('description'){{ str_limit(strip_tags($description),100) }}@endsection

@section('content')

    
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Our {{ $title }}</h2>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#" class="active">{{ $title }}</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- blog area -->
    <section class="blog_all">
        <div class="container">
            <div class="row m0 blog_row">
                <div class="col-sm-8 main_blog">
                    <div class="blog-body">
                    @if(count($allPostsByCat)>0)
                    @foreach($allPostsByCat as $post)
                        <div class="blog_content">
                        <a href="{{route('getPostBySlug', $post->slug) }}" style="text-decoration:none">
                            <h3 class="blog_heading" style="padding-bottom: 20px;">{{ $post->title }}</h3>
                        </a>
                        <div class="blog_admin" style="padding-bottom:0px;">
                            <span>
                                <i class="fa fa-user"></i> {{ $post->Creator!=null?$post->Creator->name:null }}
                            </span>
                            <span class="tags" style="padding:0 10px;"><i class="fa fa-tags"></i> {!! Func::tagLinks($post->strTags())!!}</span>
                            <span><i class="fa fa-calendar"></i> {{ $post->created_at!=null?$post->created_at->toDateString():'' }}</span>
                        </div>
                        <hr/>

                        <div class="row cat-content-body">
                            <div class="col-sm-6">
                                <a href="{{route('getPostBySlug', $post->slug) }}" style="text-decoration:none">
                                <img src="{{$post->mainImage()}}" class="media-object" style="width:100%;height: 200px;">
                                </a>
                            </div>
                            <div class="col-sm-6">

                                {!! str_limit($post->body, 200) !!}
                                <div class="" style="float: left">
                                    <a href="{{route('getPostBySlug', $post->slug) }}"
                                       class="btn btn-danger btn-sm">{{trans('app.read more')}}</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        </div>
                    @endforeach
                    @else
                        <div class="alert alert-warning text-center"><h5>{{ trans('app.no articles') }}</h5></div>

                    @endif
                </div>
                </div>
                <div class="col-sm-4 widget_area">
                    <div class="resent">
                        <h3>RECENT POSTS</h3>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="images/blog/rs-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="">Get informed about construction industry trends &amp; development.</a>
                                <h6>Oct 19, 2016</h6>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="images/blog/rs-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="">Get informed about construction industry trends &amp; development.</a>
                                <h6>Oct 19, 2016</h6>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="images/blog/rs-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="">Get informed about construction industry trends &amp; development.</a>
                                <h6>Oct 19, 2016</h6>
                            </div>
                        </div>
                    </div>
                    <div class="resent">
                        <h3>CATEGORIES</h3>
                        <ul class="architecture">
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Construction</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Architecture</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Building</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Design</a></li>
                        </ul>
                    </div>
<!--
                    <div class="resent">
                        <h3>ARCHIVES</h3>
                        <ul class="architecture">
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>February 2016</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>April 2016</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>June 2016</a></li>
                        </ul>
                    </div>
                    <div class="search">
                        <input type="search" name="search" class="form-control" placeholder="Search">
                    </div>
-->
                    <div class="resent">
                        <h3>Tag</h3>
                        <ul class="tag">
                            <li><a href="#">PAINTING</a></li>
                            <li><a href="#">CONSTRUCTION</a></li>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Building</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Design</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog area -->   
    
    
<!--
<section class="category-page" style="min-height:500px;">  
    <div class="r-ow">
        <div class="col-sm-8">
             <h4 class="category-title">{{ $title }}</h4>
            <div class="category-body">
                @if(count($allPostsByCat)>0)
                @foreach($allPostsByCat as $post)
                    <div class="cat-content">
                    <a href="{{route('getPostBySlug', $post->slug) }}" style="text-decoration:none">
                        <h3 class="media-heading" >{{ $post->title }}</h3>
                    </a>
                    <div class="bar-data">
                        <span>
                            <i class="fa fa-user"></i> {{ $post->Creator!=null?$post->Creator->name:null }}
                        </span>
                        <span>
                            <i class="fa fa-folder"></i>
                            <a href="{{route('categoryBySlug', $post->Category->slug)}}">{{ $post->Category->title }}</a>
                        </span>
                        <span class="tags"><i class="fa fa-tags"></i> {!! Func::tagLinks($post->strTags())!!}</span>
                    </div>
                    <hr/>
                    
                    <div class="row cat-content-body">
                        <div class="col-sm-6">
                            <a href="{{route('getPostBySlug', $post->slug) }}" style="text-decoration:none">
                            <img src="{{$post->mainImage()}}" class="media-object" style="width:100%;height: 200px;">
                            </a>
                        </div>
                        <div class="col-sm-6">

                            {!! str_limit($post->body, 200) !!}
                            <div class="" style="float: left">
                                <a href="{{route('getPostBySlug', $post->slug) }}"
                                   class="btn btn-danger btn-sm">{{trans('app.read more')}}</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    </div>
                @endforeach
                @else
                    <div class="alert alert-warning text-center"><h5>{{ trans('app.no articles') }}</h5></div>

                @endif
            </div>
        </div>
        <div class="hidden--xs col-xs-12 col-sm-4">
            @include('sidebar')
        </div>
    </div>
</section>
-->

@stop

