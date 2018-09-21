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
                @if(count($data)>0)
                @foreach($data as $post)
                    <div class="blog_content">
                    <a href="{{route('getPostBySlug', $post->slug) }}" style="text-decoration:none">
                        <h3 class="blog_heading" style="padding-bottom: 10px;">{{ $post->title }}</h3>
                    </a>
                    <div class="blog_admin" style="padding-bottom:0px;margin:0 10px;">
                        <span>
                            <i class="fa fa-user"></i> {{ $post->Creator!=null?$post->Creator->name:null }}
                        </span>
                        <span class="tags" style="padding:0 10px;"><i class="fa fa-tags"></i> {!! Func::tagLinks($post->strTags())!!}</span>
                        <span><i class="fa fa-calendar"></i> {{ $post->created_at!=null?$post->created_at->toDateString():'' }}</span>
                    </div>
                    <hr style="margin-bottom: 5px;margin-top: 5px;"/>

                    <div class="cat-content-body" style="background-color:#eee;padding:10px;">
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
             @include('front.sidebar',['slug'=>$slug])
             </div>
        </div>
    </div>
</section>
<!-- End blog area -->   
    
   
@stop

