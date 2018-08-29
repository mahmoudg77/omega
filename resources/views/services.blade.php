@extends('layouts.app')

@section('title') Services @endsection

@section('content')

<!-- Banner area -->
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Our Services</h2>
    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li><a href="#" class="active">Services</a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- Our Services Area -->
<section class="our_services_tow">
    @if($cat=\App\Models\Category::where('slug','services')->first())
    <div class="container">
        <div class="architecture_area services_pages">
            <div class="portfolio_filter portfolio_filter_2">
                <ul>
                    <li data-filter="*" class="active"><a href=""><i class="fa fa-wrench" aria-hidden="true"></i>All</a></li>
                    @foreach($cat->Chields as $c)
                    <li data-filter=".{{$c->slug}}"><a href="">
                        <i class="{{$c->icon}}" aria-hidden="true"></i> {{$c->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="portfolio_item portfolio_2">
               <div class="grid-sizer-2"></div>
                <div class="blog_tow_area ">
                   <div class="row blog_tow_row">
                       @foreach($cat->Chields as $c)
                       @foreach($c->Posts()->orderBy('id','desc')->limit(6)->get() as $p)
                        <div class="single_facilities {{$c->slug}} col-md-4 col-sm-6">
                            <div class="renovation">
                                <img src="{{$p->mainImage()}}" alt="{{$p->title}}" class="img-responsive" 
                                     style="height: 260px;width: 100%;"/>
                                <div class="renovation_content">
                                    <a class="clipboard" href="#"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                                    <a class="tittle" href="#">{{$p->title}}</a>
                                    <div class="date_comment">
                                        <a href="javascript:;"><i class="fa fa-calendar" aria-hidden="true"></i>
                                            {{ $p->created_at!=null?$p->created_at->toDateString('M-d-Y'):'' }}
                                        </a>
                                       <!-- <a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i>3</a>-->
                                    </div>
                                    {!! str_limit($p->body, 200) !!}
                                </div>
                            </div>
                        </div>
                       @endforeach
                       @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
<!-- End Our Services Area -->


@stop

