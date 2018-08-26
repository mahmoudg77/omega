@extends('layouts.app')

@section('title'){{$singlePost->title}}@endsection
@section('description'){{ str_limit(strip_tags($singlePost->body),250) }}@endsection
@section('keywords'){{$singlePost->strTags()}}@endsection
@section('image'){{$singlePost->mainImage()}}@endsection
@section('js')
<script>
    $(function () {
        $("#comments>li:first-of-type>a").click();
    })
</script>
@endsection
@section('content')

<!-- Banner area -->
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Our </h2>
    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li><a href="#" class="active"></a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- blog area -->
<section class="blog_all">
    <div class="container">
        <div class="row m0 blog_row">
            <div class="col-sm-8 main_blog">
                <div class="blog-body">
                    <div class="single-box" >
                    <div class="single-img">
                        <img src="{{$singlePost->mainImage()}}" class="img-responsive img-thumbanail" style="margin: auto;max-height: 500px;"/>
                    </div>
                    <div class="single-content">
                        <h2>{{ $singlePost->title }}</h2>
                        <div class="bar-data">
                                <span>
                                    <i class="fa fa-user"></i> {{ $singlePost->Creator!=null?$singlePost->Creator->name:null }}
                                </span>
                                <span>
                                    <i class="fa fa-folder"></i>
                                    <a href="{{route('categoryBySlug', $singlePost->Category->slug)}}">{{ $singlePost->Category->title }}</a>
                                </span>
                                <span>
                                    <i class="glyphicon glyphicon-time" style="font-size: 13px;"></i>
                                    {{ $singlePost->created_at!=null?$singlePost->created_at->toDateString():'' }}
                                </span>
                                <span class="tags"><i class="fa fa-tags"></i> {!! Func::tagLinks($singlePost->strTags())!!}</span>

                        </div>

                        <p>{!! $singlePost->body !!} </p>
                    @if(Setting::getIfExists('allow_share',false))
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b22627b8f9a1fe2"></script>
                    @endif
                    </div>

                    <div class="related-post">
                    <h4 class="related-post-heading">{{ trans('app.related posts')}}</h4>
                    @if(count($related_posts)>0)
                    @foreach($related_posts as $rpost)
                        <div class="col-md-4">
                        <a href="{{ route('getPostBySlug', $rpost->slug) }}">
                            <div class="related-post-item">
                                <figure>
                                    <img class="img-responsive center-block" src="{{$rpost->mainImage()}}"/>

                                </figure>
                                <h4 class="related-title">{!! str_limit($rpost->title, 30) !!}</h4>
                            </div>

                        </a>
                        </div>
                    @endforeach

                    @else
                        {{--<div class="alert alert-warning text-center"><h5>{{ trans('app.no articles') }}</h5></div>--}}
                    @endif
                    </div>
                    @if(Setting::getIfExists('allow_website_comment',false) || Setting::getIfExists('allow_facebook_comment',false))
                    <h4 class="related-post-heading">{{ trans('app.comments')}}</h4>
                    <ul class="nav nav-tabs" id="comments">
                        @if(Setting::getIfExists('allow_website_comment',false))
                            <li class="">
                                <a data-toggle="tab"
                                   href="#website_comments">{{ trans('app.website comments')}}</a>
                            </li>
                        @endif
                        @if(Setting::getIfExists('allow_facebook_comment',false))
                            <li class="">
                                <a data-toggle="tab"
                                   href="#facebook_comments">{{ trans('app.facebook comments')}}</a>
                            </li>
                        @endif
                    </ul>

                    <div class="tab-content">
                    @if(Setting::getIfExists('allow_website_comment',false))
                        <div id="website_comments" class="tab-pane fade in" >
                            <div class="alert alert-warning">{{trans('app.comments') . ' ' . trans('app.not_available_now')}}</div>
                        </div>
                    @endif
                    @if(Setting::getIfExists('allow_facebook_comment',false))
                        <div id="facebook_comments" class="tab-pane fade in" >
                            <div class="fb-comments" data-href="{{request()->url()}}" data-numposts="5" data-width="100%"></div>
                        </div>
                    @endif
                    </div>
                    @endif
                </div>
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


<section class="single" style="min-height:500px;">
    <div class="">
        <div class="col-xs-12 col-sm-8">
            <div class="single-box" >
                <div class="single-img">
                    <img src="{{$singlePost->mainImage()}}" class="img-responsive img-thumbanail" style="margin: auto;max-height: 500px;"/>
                </div>
                <div class="single-content">
                    <h2>{{ $singlePost->title }}</h2>
                    <div class="bar-data">
                            <span>
                                <i class="fa fa-user"></i> {{ $singlePost->Creator!=null?$singlePost->Creator->name:null }}
                            </span>
                            <span>
                                <i class="fa fa-folder"></i>
                                <a href="{{route('categoryBySlug', $singlePost->Category->slug)}}">{{ $singlePost->Category->title }}</a>
                            </span>
                            <span>
                                <i class="glyphicon glyphicon-time" style="font-size: 13px;"></i>
                                {{ $singlePost->created_at!=null?$singlePost->created_at->toDateString():'' }}
                            </span>
                            <span class="tags"><i class="fa fa-tags"></i> {!! Func::tagLinks($singlePost->strTags())!!}</span>

                    </div>

                    <p>{!! $singlePost->body !!} </p>
                @if(Setting::getIfExists('allow_share',false))
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b22627b8f9a1fe2"></script>
                @endif
                </div>

                <div class="related-post">
                <h4 class="related-post-heading">{{ trans('app.related posts')}}</h4>
                @if(count($related_posts)>0)
                @foreach($related_posts as $rpost)
                    <div class="col-md-4">
                    <a href="{{ route('getPostBySlug', $rpost->slug) }}">
                        <div class="related-post-item">
                            <figure>
                                <img class="img-responsive center-block" src="{{$rpost->mainImage()}}"/>

                            </figure>
                            <h4 class="related-title">{!! str_limit($rpost->title, 30) !!}</h4>
                        </div>

                    </a>
                    </div>
                @endforeach

                @else
                    {{--<div class="alert alert-warning text-center"><h5>{{ trans('app.no articles') }}</h5></div>--}}
                @endif
                </div>
                @if(Setting::getIfExists('allow_website_comment',false) || Setting::getIfExists('allow_facebook_comment',false))
                <h4 class="related-post-heading">{{ trans('app.comments')}}</h4>
                <ul class="nav nav-tabs" id="comments">
                    @if(Setting::getIfExists('allow_website_comment',false))
                        <li class="">
                            <a data-toggle="tab"
                               href="#website_comments">{{ trans('app.website comments')}}</a>
                        </li>
                    @endif
                    @if(Setting::getIfExists('allow_facebook_comment',false))
                        <li class="">
                            <a data-toggle="tab"
                               href="#facebook_comments">{{ trans('app.facebook comments')}}</a>
                        </li>
                    @endif
                </ul>

                <div class="tab-content">
                @if(Setting::getIfExists('allow_website_comment',false))
                    <div id="website_comments" class="tab-pane fade in" >
                        <div class="alert alert-warning">{{trans('app.comments') . ' ' . trans('app.not_available_now')}}</div>
                    </div>
                @endif
                @if(Setting::getIfExists('allow_facebook_comment',false))
                    <div id="facebook_comments" class="tab-pane fade in" >
                        <div class="fb-comments" data-href="{{request()->url()}}" data-numposts="5" data-width="100%"></div>
                    </div>
                @endif
                </div>
                @endif
            </div>
        </div>

        <div class="hidden--xs col-xs-12 col-sm-4">
            @include('sidebar')
        </div>
    </div>
</section>



@stop
