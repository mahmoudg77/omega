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
                <div class="blog">
                    <img src="{{$singlePost->mainImage()}}" class="img-responsive img-thumbanail blog-img" alt="{{$singlePost->title}}"
                        style="width:100%"/>
                        <div class="blog-body">
                            <h2 style="margin:20px 0;">{{$singlePost->title}} 
                                <small><i class="fa fa-angle-double-right"></i> <span class="blog-client">Client : {{$singlePost->RelatedPost('Client')->title}}</span></small>
                            </h2>
                            <hr>
                            <!--<hr style="margin:5px 0;">-->
                            <!--<strong>Client :</strong> {{$singlePost->RelatedPost('Client')->title}}-->
                            <!--<hr style="margin:5px 0;">-->
                            <div style="line-height: 40px;margin: 30px 0;">{!! $singlePost->body !!}</div>
                        </div>
                </div>
            </div>
              <div class="col-sm-4 widget_area">
                 @include('front.sidebar',['slug'=>'lvp'])
            </div>
        </div>
    </div>
</section>
<!-- End blog area -->


@stop
