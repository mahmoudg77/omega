@extends('layouts.app')

@section('content')
  
  @php
   $slides= App\Models\Post::where('post_type_id',4)->where('is_published',1)->get();
  @endphp
  @if(count($slides)>0)
    <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">
            @foreach($slides as $slide )
            <div data-thumb="{{$slide->mainImage()}}" data-src="{{$slide->mainImage()}}">
                <div class="camera_caption">
                   <div class="container">
                        {{--<h5 class=" wow fadeInUp animated">Welcome to our</h5>--}}
                        <h1 class=" wow fadeInUp animated" data-wow-delay="0.5s">{{$slide->title}}</h1>
                       <br/>
                       <br/>
                        <h2 class=" wow fadeInUp animated" data-wow-delay="0.8s">{!! str_limit(strip_tags( $slide->body), 300,"") !!}</h2>
                        {{--<a class=" wow fadeInUp animated" data-wow-delay="1s" href="{{route('getPostBySlug',$slide->slug)}}">{{trans('app.read more')}}</a>--}}
                   </div>
                </div>
            </div>
            @endforeach
          

        </div>
    </section>
    <!-- End Slider area -->
@endif


@endsection
