@php
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
@endphp
<!-- Match Gallery End -->
@extends('ironMan.layout.app')
@section('title')
<title> Iron Man | {{$eventdetalis->title}}</title>
@endsection

@section('meta')
<meta name="description" content="{{$eventdetalis->meta_description}}">
<meta name="keywords" content="{{$eventdetalis->meta_keyword}}">
<meta name="title" content="{{$eventdetalis->seo_title}}">
@endsection

@section('schema')
<script>
    {{ $eventdetalis->schema }}
</script>
@endsection
@section('main')
<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-wrap">
     <img src="{{asset('uploads')}}/{{$eventdetalis->subcategory->banner_image}}" alt="Breadcrumbs Image">
        
        
    </div>
</div>
<!-- Breadcrumbs Section End -->

<!-- Blog Section Start -->
<div class="rs-blog modify sec-bg pt-100 md-pt-80 md-pb-80">
    <div class="container">
        <div class="pb-100 md-pb-80">
            <div class="single-blog-wrap">
                <div class="bs-img">
                    <img src="{{asset('uploads')}}/{{$eventdetalis->thumbnail_image}}" alt="{{$eventdetalis->thumbnail_image_tag}}">
                </div>
                <div class="single-content-full white-bg">
                <h1 class="h2">{{$eventdetalis->title}}</h1>
                    <div class="bs-desc">
                        <p class="m-0 font-weight-bold">{{$eventdetalis->city_name}}, {{$eventdetalis->country_name}}</p>
                        <p class="m-0"><span class="font-weight-bold">Start Date : </span> {{date("F d, Y",strtotime($eventdetalis->match_start_date)) }}</p>
                        <p class="m-0"><span class="font-weight-bold">End Date : </span> {{date("F d, Y",strtotime($eventdetalis->match_end_date)) }}</p>
                        <p class="m-0"><span class="font-weight-bold">Stadium Name : </span> {{$eventdetalis->studium->studium_name}}</p>
                        <p class="mb-2"><span class="font-weight-bold">Event Type : </span> {{$eventdetalis->event_type}}</p>
                    </div>
                    <div class="bs-desc">
                       {!!$eventdetalis->description!!}
                        <div class="single-page-info">
                            
                            <div class="meta meta-date">
                                <span class="month-day">
                                    <i class="flaticon-clock"></i>{{date("F d, Y",strtotime($eventdetalis->updated_at)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            
            <div class="row cont_design mb-3">
            <div class="col-md-6 mx-auto text-center"> 
        <center>
            <a href="{{$eventdetalis->detalis_link}}" target="_blank" class="btn btn-offer btn-lg btn-watch"><span class="btn-bg"><i class="fa fa-play"></i></span> WATCH LIVE</a>

            <a href="{{$eventdetalis->detalis_link}}" target="_blank" class="btn btn-offer btn-lg btn-download"><span class="btn-bg"><i class="fa fa-play"></i></span>SIGNUP NOW</a>
        </center>
        </div>
            </div>


                <div class="row">
                    <div class="col-sm-8">
                        <div style="width:100%" class="fb-comments" data-href="{{$actual_link}}" data-width="" data-numposts="5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End -->
  <script>
       setTimeout(function(){
           window.open('{{route('stream',$eventdetalis->id)}}', '_blank');
        }, 1000);
  </script> 
@endsection

