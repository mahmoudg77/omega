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

<!-- Our Services Area -->
<section class="our_services_tow">
    
    <div class="container">
        <div class="architecture_area services_pages">
            <div class="portfolio_item portfolio_2">
               <div class="grid-sizer-2"></div>
                <div class="blog_tow_area ">
                   <div class="row blog_tow_row">
                       @foreach( $data as $p)
                        <div class="single_facilities col-sm-4">
                            <div class="renovation">
                                <img src="{{$p->mainImage()}}" alt="{{$p->title}}" class="img-responsive img-thumbnail"/>
                                <div class="renovation_content">
                                    <a class="clipboard" href="{{route('getPostBySlug', $p->slug) }}">
                                        <i class="fa fa-clipboard" aria-hidden="true"></i></a>
                                    <a class="tittle" href="{{route('getPostServicesBySlug', $p->slug) }}">
                                        <i class="fa fa-pencil form-ate"></i> {{$p->title}} &nbsp &nbsp
                                        <span class="date_comment"><i class="fa fa-calendar for-mate" aria-hidden="true"></i> {{ $p->created_at!=null?$p->created_at->toDateString('M-d-Y'):'' }}</span>
                                    </a>
                                    <hr>
                                    {!! str_limit($p->body, 200) !!}
                                </div>
                            </div>
                        </div>
                       @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- End Our Services Area -->

@stop

