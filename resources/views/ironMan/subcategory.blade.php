@extends('ironMan.layout.app')
@section('title')
<title>Iron Man | {{isset($banner_image->subcat_name)?$banner_image->subcat_name:''}} </title>
@section('meta')
<meta name="description" content="{{$banner_image->meta_description}}">
<meta name="keywords" content="{{$banner_image->meta_keyword}}">
@endsection
@endsection

@section('main')
<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-wrap"><img src="{{asset('uploads')}}/{{$banner_image->banner_image}}"
            alt="Breadcrumbs Image">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="breadcrumbs-text">
                    <h1 class="breadcrumbs-title mb-17"></h1>
                    <div class="categories"></div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Breadcrumbs Section End -->

<!-- Shape Background Start -->
<div class="shape-bg pt-90 md-pt-72">
    <!-- Upcoming Match Start -->
    <!-- Upcoming Match Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <!--up coming match -->
                <div class="rs-match-fixture">
                    <div class="title-style bracket text-center mb-35 md-mb-10">
                        <h2 class="title margin-0 uppercase">Upcoming Match</h2>
                    </div>
                    <div class="match-list sec-bg">
                        <table>
                            <tbody>
                                @if (isset($upcoming_match) && $upcoming_match->count() > 0)
                                @foreach ($upcoming_match as $upcoming_match_item)
                                <tr>
                                    <td class="medium-font"> <a href="{{route('eventdetalis',$upcoming_match_item->title_slug)}}">{{$upcoming_match_item->title}}</a></td>
                                    <td class="medium-font">{{$upcoming_match_item->subcategory->subcat_name}}</td>
                                    <td>{{date("F d, Y",strtotime($upcoming_match_item->match_start_date)) }}</td>
                                    <td>{{$upcoming_match_item->studium->studium_name}}</td>
                                </tr>
                                @endforeach
                                    <tr class="text-center">
                                        <td rowspan="2"><ul>{{ $upcoming_match->links() }}</ul></td>
                                    </tr>
                                @elseif (isset($alternrt_match) && $alternrt_match->count() > 0)
                                @foreach ($alternrt_match as $alternrt_match_item)
                                <tr>
                                    <td class="medium-font"> <a href="{{route('eventdetalis',$alternrt_match_item->title_slug)}}">{{$alternrt_match_item->title}}</a></td>
                                    <td class="medium-font">{{$alternrt_match_item->subcategory->subcat_name}}</td>
                                    <td>{{date("F d, Y",strtotime($alternrt_match_item->match_start_date)) }}</td>
                                    <td>{{$alternrt_match_item->studium->studium_name}}</td>
                                </tr>
                                @endforeach
                                <tr class="text-center">
                                        <td rowspan="2"><ul>{{ $alternrt_match->links() }}</ul></td>
                                    </tr>
                                @else
                                <div class="col-lg-12 text-center">
                                    <h1 class="text-regular font-accent text-primary text-italic"><span
                                            class="big"></span></h1>
                                    <h1>Don't have an upcoming event on your website.</h1>
                                    <hr class="divider divider-dashed offset-top-60">
                                    <p class="offset-top-45">Unfortunately the event you were looking for could not be
                                        found.</p>
                                </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--up coming match -->
            </div>
            <div class="col-md-6">
                <!--   video area start -->
                @if (isset($video_section))
                
                <div class="rs-video big-space2 bg9 text-center" style="background-image: url({{asset('uploads')}}/{{$video_section->thumbnail_image}});">
                    <div class="container">
                        <div class="video-contents">
                            <a class="play-btn btn" href="{{route('eventdetalis',$video_section->title_slug)}}"><i
                                    class="fa fa-play"></i></a>
                            <h4 class="title white-color mt-24 mb-0">Watch Now </h4>
                        </div>
                    </div>
                </div>
                @elseif (isset($video_section_alt))
                <div class="rs-video big-space2 bg9 text-center" style="background-image: url({{asset('uploads')}}/{{$video_section_alt->thumbnail_image}});">
                    <div class="container">
                        <div class="video-contents">
                            <a class="play-btn btn" href="{{route('eventdetalis',$video_section_alt->title_slug)}}"><i
                                    class="fa fa-play"></i></a>
                            <h4 class="title white-color mt-24 mb-0">Watch Now </h4>
                        </div>
                    </div>
                </div>
                @endif
                <!--  video area end -->
            </div>
        </div>
    </div>
    <!-- Upcoming Match End -->
    <!-- Upcoming Match End -->

    <!--           event area start -->
    <div class="rs-blog modify pt-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="title-style text-center bracket mb-54 md-mb-30">
                <h2 class="title margin-0 uppercase">Our Event</h2>
            </div>
            <div class="pb-100 md-pb-80">
                <div class="row">
                    @if ($our_event->count() > 0)
                        @foreach ($our_event as $our_event_item)
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-md-4 mb-30">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <div class="image-wrap">
                                            <a href="{{route('eventdetalis',$our_event_item->title_slug)}}"><img src="{{asset('uploads')}}/{{$our_event_item->thumbnail_image}}" alt="{{$our_event_item->thumbnail_image_tag}}"></a>
                                        </div>
                                        <div class="all-meta">
                                            <div class="meta meta-date">
                                                @php
                                                    $match_date = $our_event_item->match_start_date;
                                                    $date = explode("-",$match_date)
                                                @endphp
                                                <span class="month-day">{{$date[2]}}</span>
                                                <span class="month-name">{{date("M",strtotime($match_date))}}</span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <h4 class="blog-title">
                                            <a href="{{route('eventdetalis',$our_event_item->title_slug)}}">{{$our_event_item->title}}</a>
                                        </h4>
                                        <div class="blog-desc">{!!textshorten($our_event_item->description,150)!!}</div>
                                        <div class="read-button">
                                            <a href="{{route('eventdetalis',$our_event_item->title_slug)}}">Continue Reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                    @endif
                   
                </div>
                <div class="row">
                    @if (isset($our_event))
                    <ul>
                        {{ $our_event->links() }}
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--           event area end -->



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
                            </ul>
                            <h3 class="news-title">
                               <a href="{{route('newsdetails',$news_item->title_slug)}}">{{$news_item->title}}</a>
                            </h3>
                            <div class="desc">{!!textshorten($news_item->description, 200)!!}</div>
                        </div>
                    </div>
                    @endforeach
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
@endsection
