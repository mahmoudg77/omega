@extends('layouts.app')

@section('title') {{$singlePost->title}} @endsection

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

<!-- Our Services Area -->
<section class="our_services_tow">
    
    <div class="container">

        <div class="architecture_area tabs">
            <div class="portfolio_filter portfolio_filter_2">
            <ul>
                <li data-filter="tab-item" style="width: 25%;"  class="active"><a  href="#" data-link="{{route('getPostBySlug','history')}}"><i class="fa fa-history" aria-hidden="true"></i> History</a></li>
                <li data-filter="tab-item" style="width: 25%;"  ><a href="#" data-link="{{route('getPostBySlug','vision-mission')}}"> <i class="fa fa-eye " aria-hidden="true"></i> Vision & Mission</a></li>
                <li data-filter="tab-item" style="width: 25%;"  ><a href="#" data-link="{{route('getPostBySlug','certified-authorized')}}"> <i class="fa fa-certificate" aria-hidden="true"></i> Certified & Authorized</a></li>
                <li data-filter="tab-item" style="width: 25%;"  ><a href="#" data-link="{{route('getPostBySlug','organization')}}"> <i class="fa fa-sitemap " aria-hidden="true"></i> Organization</a></li>
            </ul>

            </div>
            <div class="portfolio_item">
                <div class="single_facilities tab-item ">
                  </div>
            </div>
    </div>
    
</section>
<!-- End Our Services Area -->


@endsection
@section('js')
<script>
    $(function(){
       $(".architecture_area li").click(function(){
           //e.preventDefault();
           var $this=$(this);
           $this.closest('.tabs').find('.portfolio_item').first('div').load($this.find('a').data('link'));
       });
       $(".tabs li.active").click();
    });
</script>

@endsection

