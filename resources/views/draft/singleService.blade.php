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
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{$singlePost->mainImage()}}" class="img-responsive img-thumbanail" alt="{{$singlePost->title}}"
                                style="width:100%"/>
                        </div>
                        <div class="col-sm-6">
                            <h2 style="margin:20px 0;">{{$singlePost->title}}</h2>
                            <hr style="margin:5px 0;">
                                <strong>Client :</strong> {{$singlePost->RelatedPost('Client')->title}}
                                <hr style="margin:5px 0;">

                            <div style="line-height: 40px;margin: 30px 0;">{!! $singlePost->body !!}</div>
                        </div>
                    </div>   
                </div>
            </div>
              <div class="col-sm-4 widget_area">
                <div class="resent" style="padding-bottom: 40px;">
                    <h3 class="text-uppercase">{{trans('app.last articles')}}</h3>
                    <hr>
                    @if($cat=\App\Models\Category::where('slug','services')->first())
                    @foreach($cat->Posts()->orderBy('id','desc')->limit(4)->get() as $post)
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{$post->mainImage()}}" alt="{{ $post->title}}" style="width:70px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{route('getPostBySlug', $post->slug) }}">{!! str_limit($post->body, 70) !!}</a>
                                <h6>{{ $post->created_at!=null?$p->created_at->toDateString():'' }}</h6>
                            </div>
                        </div>
                    @endforeach
                   @endif
                </div>

                 <div class="resent">
                    <h3>Tags</h3>
                    <ul class="tag">
                        <li>
                            {!! Func::tagLinks(implode(',',App\Models\Tag::select('name')->pluck('name')->all()))!!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog area -->


@stop
