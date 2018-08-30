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
                            <div style="line-height: 40px;margin: 30px 0;">{!! $singlePost->body !!}</div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog area -->


@stop
