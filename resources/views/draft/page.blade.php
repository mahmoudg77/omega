@extends('layouts.app')

@section('title'){{$singlePost->title}}@endsection
@section('description'){{ str_limit(strip_tags($singlePost->body),250) }}@endsection

@section('content')

<!-- Banner area -->
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>{{$singlePost->title}}</h2>
    <ol class="breadcrumb">
        <li><a href="/">{{trans('app.home')}}</a></li>
        <li><a href="javascript:;" class="active">{{$singlePost->title}}</a></li>
    </ol>
</section>
<!-- End Banner area -->

<section class="blog_all">
    <div class="container">
        <div class="row m0 blog_row">
            <div class="col-sm-8 main_blog">
                <div class="blog-body">
                    <h2 style="margin:20px 0;">{{$singlePost->title}}</h2>
                    <hr style="margin:5px 0;">
                    <!--<img src="{{$singlePost->mainImage()}}" class="img-responsive img-thumbanail" style="width:100%"/>-->
                    <!--<br>-->
                    <div style="line-height: 40px;margin: 30px 0;">{!! $singlePost->body !!}</div>
                    <hr style="margin:5px 0 20px;">
                </div>
            </div>
        </div>
    </div>
</section>
@stop
