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

<!-- blog area -->
<section class="blog_all">
    <div class="container">
        <div class="row m0 blog_row">
            <div class="col-sm-8 main_blog">
                <div class="blog-body">
                    <div class="sin-gle-box" >
                        <img src="{{$singlePost->mainImage()}}" class="img-responsive img-thumbanail" style="width:100%"/>
                        <h2 style="margin:20px 0;"></h2>
<!--
                        <div class="bar-data" style="padding:10px">
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
-->
                        <hr style="margin:5px 0;">
                        
                        <div style="line-height: 40px;margin: 30px 0;"></div>
                        <hr style="margin:5px 0 20px;">
                        <div>
                            @if(Setting::getIfExists('allow_share',false))
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b22627b8f9a1fe2"></script>
                            @endif
                        </div>

                    <div class="related-post">
                        <h4 class="related-post-heading" style="margin:20px 0;padding:10px;background-color:#eee">
                            {{ trans('app.related posts')}}</h4>
<!--
                            @if(count($related_posts)>0)
                            @foreach($related_posts as $rpost)
                                <div class="col-md-4">
                                <a href="{{ route('getPostBySlug', $rpost->slug) }}">
                                    <div class="related-post-item">
                                        <figure>
                                            <img class="img-responsive center-block" src="{{$rpost->mainImage()}}"/>
                                        </figure>
                                        <h4 class="related-title" style="background-color: #e71d1d;padding: 10px;color: #fff;">
                                            {!! str_limit($rpost->title, 30) !!}
                                        </h4>
                                    </div>
                                </a>
                                </div>
                            @endforeach

                            @else
                                {{--<div class="alert alert-warning text-center"><h5>{{ trans('app.no articles') }}</h5></div>--}}
                            @endif
-->
                    </div>
                    <div class="clearfix"></div>    
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog area -->


@stop
