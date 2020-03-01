@extends('ironMan.layout.app')
@section('title')
    <title>SATT IT | Iron Man </title>
@endsection

    <!-- Slider Section Start -->
    @section('main')
    <div id="rs-slider" class="rs-slider home-slider slider-navigation">
        <video autoplay="" playsinline="" loop="" muted="" width="100%"
            poster="https://assets.ngin.com/site_files/41608/videos/posterCatalog.jpg">
            <source src="{{isset($slider_video->image_one)?$slider_video->image_one:''}}" type="video/mp4">

            Sorry, your browser doesn't support embedded videos.
        </video>
    </div>
  
    <!-- Slider Section End -->

    <!-- Shape Background Start -->
    <div class="shape-bg">
        <!--up coming match -->
        <div class="rs-match-fixture pt-92 md-pt-72">
            <div class="container">
                <div class="title-style bracket text-center mb-35 md-mb-10">
                    <h2 class="title margin-0 uppercase">Upcoming Match</h2>
                </div>
                <div class="match-list sec-bg">
                    <table>
                        <tbody>
                            @if ($upcoming_match->count() > 0)
                                @foreach ($upcoming_match as $upcoming_match_item)
                                    <tr>
                                        <td> <a href="{{route('eventdetalis',$upcoming_match_item->title_slug)}}">{{$upcoming_match_item->title}}</a></td>
                                        <td class="medium-font">{{$upcoming_match_item->subcategory->subcat_name}}</td>
                                        <td>{{date("F d, Y",strtotime($upcoming_match_item->match_start_date)) }}</td>
                                        <td>{{$upcoming_match_item->studium->studium_name}}</td>
                                    </tr>
                                @endforeach
                            @elseif ($alternrt_match->count() > 0)
                                @foreach ($alternrt_match as $alternrt_match_item)
                                    <tr>
                                        <td> <a href="{{route('eventdetalis',$alternrt_match_item->title_slug)}}">{{$alternrt_match_item->title}}</a></td>
                                        <td class="medium-font">{{$alternrt_match_item->subcategory->subcat_name}}</td>
                                        <td>{{date("F d, Y",strtotime($alternrt_match_item->match_start_date)) }}</td>
                                        <td>{{$alternrt_match_item->studium->studium_name}}</td>
                                    </tr>
                                @endforeach
                            @else
                            <div class="col-lg-12 text-center">
                                <h1 class="text-regular font-accent text-primary text-italic"><span class="big"></span></h1>
                                <h1>Don't have an upcoming event on your website.</h1>
                                <hr class="divider divider-dashed offset-top-60">
                                <p class="offset-top-45">Unfortunately the event you were looking for could not be found.</p>
                            </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--up coming match -->


        <!-- Latest News Section Start -->
        <div class="rs-lates-news pt-90 pb-100 md-pt-72 md-pb-68">
            <div class="container">
                <div class="title-style text-center bracket mb-54 md-mb-30">
                    <h2 class="title margin-0 uppercase">Latest News</h2>
                </div>
                <div class="latest-news-slider">
                    <div class="news-slider-full">
                        @if ($news_latest->count() > 0)
                            @foreach ($news_latest as $news_item)
                                <div class="slider-item">
                                    <img src="{{asset('uploads')}}/{{$news_item->image}}" alt="{{$news_item->image_alt}}">
                                    <div class="contents">
                                        <ul class="meta">
                                            <li>
                                                <i class="fa fa-calendar-check-o"></i>
                                                <span>{{date("F d, Y",strtotime($news_item->date)) }}</span>
                                            </li>
                                            <!-- <li>
                                                <i class="fa fa-user-o"></i>
                                                <span><a href="javascript:void(0)">{{$news_item->user->name}}</a></span>
                                            </li> -->
                                        </ul>
                                        <h3 class="news-title">
                                            <a href="{{route('newsdetails',$news_item->title_slug)}}">{{$news_item->title}}</a>
                                        </h3>
                                        <div class="desc">{!!textshorten($news_item->description, 200)!!}</div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="col-lg-12 text-center">
                                <h1 class="text-regular font-accent text-primary text-italic"><span class="big"></span></h1>
                                <h1>Don't have  any latest news on your website.</h1>
                                <hr class="divider divider-dashed offset-top-60">
                                <p class="offset-top-45">Unfortunately the news you were looking for could not be found.</p>
                            </div>
                        @endif
                    </div>
                    <ul class="news-slider-nav">
                         @if ($news_latest->count() > 0)
                            @foreach ($news_latest as $news_item)
                                <li class="nav-item">
                                    <div class="nav-img common">
                                        <img src="{{asset('uploads')}}/{{$news_item->image}}" alt="{{$news_item->image_alt}}">
                                    </div>
                                    <div class="contents common">
                                        <h5 class="news-title">{{$news_item->title}}</h5>
                                        <ul class="meta">
                                            <li>
                                                <i class="fa fa-calendar-check-o"></i>
                                                <span>{{date("F d, Y",strtotime($news_item->date)) }}</span>
                                            </li>
                                            <!-- <li>
                                                <i class="fa fa-user-o"></i>
                                                <span>{{$news_item->user->name}}</span>
                                            </li -->
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- Latest News Section End -->
    </div>
    <!-- Shape Background End -->

<!-- About Us Section Start -->
<div class="rs-about  bg10 after-bg pt-92 pb-100 md-pt-72 md-pb-80" style="background-image: url({{asset('uploads')}}/{{isset($about_us->image)?$about_us->image:''}});">
    <div class="container">
        <div class="row rs-vertical-middle">
            @if (isset($about_us))
            <div class="col-lg-6 pr-80 col-padding-md">
                <div class="contant-part">
                    <div class="title-style mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase white-color">{{$about_us->title}}</h2>
                        <span class="line-bg left-line y-w pt-10"></span>
                    </div>
                    <div class="description dark-gray-color">
                        <p class="mb-3">{!!$about_us->description!!}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-6">
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->




    <!-- Match Gallery Start -->
    <div class="rs-gallery style1 pt-92 pb-100 md-pt-72 md-pb-80">
        <div class="container">
            <div class="title-style text-center mb-50 md-mb-30">
                <h2 class="margin-0 uppercase">Match Gallery</h2>
                <span class="line-bg y-b pt-10"></span>
            </div>
            <div class="row pl-15 pr-15">
                @if ($gallery_image->count() > 0)
                    @foreach ($gallery_image as $gallery_item)
                        <div class="col-lg-4 col-md-6 padding-0">
                            <div class="gallery-grid">
                                <img src="{{asset('uploads')}}/{{$gallery_item->gallery_image}}" alt="Gallery Image">
                                <a class="image-popup view-btn" href="{{asset('uploads')}}/{{$gallery_item->gallery_image}}">
                                    <i class="flaticon-add-circular-button"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif     
            </div>
        </div>
    </div>
    <!-- Match Gallery End -->
  @endsection