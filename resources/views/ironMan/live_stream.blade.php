<!doctype html>
<html lang="en" class="no-js">
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <title>Live Stream | {{$live_stream->title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('frontend')}}/images/stream/favicon.gif" rel=icon type="image/x-icon" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/stream/style-1.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/stream/style.css">
</head>

<body>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/stream/mov.css">

    <div class="main" style="background-image: url({{asset('uploads')}}/{{$live_stream->cover_image}});">
        <div class="row pagetop">
            <div class="col-md-12">
                <center>
                    <marquee class="h2 text-white" behavior="" direction="">{{$live_stream->video_link}} </marquee>
                </center>
            </div>
        </div>
        <div class="row main" style="padding-bottom:0px">
            <div class="col-md-8 col-md-offset-2">
                <div id="player" class="overflow">
                    <div id="streaming" data-toggle="modal" data-target="#myModal">
                        <img class="img-backdrop img-responsive" src="{{asset('uploads')}}/{{$live_stream->thumbnail_image}}" itemprop="image" alt="{{ $live_stream->thumbnail_image_tag }}">
                        <span class="mpaa2">HD</span>
                        <span class="mpaa">LIVE</span>
                        <div class="watermark"></div>
                        <div class="inline play-button registration">
                             <span class="player-loader"></span>
                            <span  class="play-btn-border ease"><i class="fa fa-play-circle headline-round ease icon-1" aria-hidden="true"></i></span>
                            
                        </div>
                    </div>
                    <div class="progress progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100" style="width: 100%"><span class="sr-only"></span>
                        </div>
                    </div>
                    <div class="control-wrap">
                        <div class="cplay"></div>
                        <div class="cvolu">
                            <div class="cvol"></div>
                            <div id="ivol" class="ui-slider-horizontal" aria-disabled="false">
                                <div class="ui-widget-header"></div><a class="ui-slider-handle" href="#"
                                    style="left: 34.3434343434343%;"></a>
                            </div>
                        </div>
                        <div class="ctime">
                            <span class="cmin" title="0" style="color:white;">00:00:00</span>
                        </div>
                        <div class="progres">
                            <span class="buffering"><span class="progressbar"></span></span>
                        </div>
                        <div class="cfull"></div>
                        <div class="cset"> </div>
                        <span class="chade" title="0" style="color:white;">LIVE</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row cont_design">
        <center>
            <a href="{{$live_stream->detalis_link}}" class="btn btn-offer btn-lg btn-watch"><span class="btn-bg"><i class="fas fa-play"></i></span> WATCH LIVE</a>

            <a href="{{$live_stream->detalis_link}}" class="btn btn-offer btn-lg btn-download"><span class="btn-bg"><i class="fas fa-play"></i></span>SIGNUP NOW</a>

            <p style="padding: 6px 60px"> {!!textshorten($live_stream->description,400)!!}</p>
        </center>
    </div>

    <div class="modal fade pagetop" id="modal-watch" tabindex="-1" role="dialog" aria-labelledby="modal-watch"
        aria-hidden="true">
        <div class="page_login">
            <center>
                <h1>
                    <font color="red">Attention!</font>
                    <font color="#f2f2f2">Login Required !!!</font>
                </h1>
                <span>
                    <h2>
                        <font color="#f2f2f2">You must create a free account to watch<br>Spence vs Garcia Live Stream </font>
                    </h2>
                </span>
                <a href="{{$live_stream->detalis_link}}"> <button type="button"
                        class="btn btn-success btn-lg">CREATE MY ACCOUNT (HD)</button> </a>
            </center>
        </div>
    </div>
    <div class="row footer" style="padding:0px;">
        <div class="col-xs-12 col-md-12 text-center mx-auto">
            <p>© {{date('Y')}} ironman24tv.com, All Rights Reserved. Design &amp; Developed by <a href="http://sattit.com/"
                    target="_blank">SATT IT</a>
            </p>
            
        </div>
    <div class="col-xs-12 col-md-12">
    <div class="text-right" style="position: fixed; bottom: 20px; right: 10px;">      
                <div id="counter" data-min="5621" data-max="10864"><span class="globe">
                    <span class="fa fa-globe"></span></span> <span class="counter-value">8,204</span> People Watching Now 
                </div>
            </div>
        </div>
</div>
    <script type="text/javascript">
        var pathloc = 'index.html';
    </script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/efec8e5df1.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-submenu a.submenu').on("click", function (e) {
                $('.dropdown-submenu .dropdown-menu').hide()
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
            $('.dropdown-toggle').on("click", function (e) {
                $('.dropdown-submenu .dropdown-menu').hide()
            })
            $('.carousel').carousel({
                interval: 5000
            })
        });

    </script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/stream/screenfull.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/stream/script.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/stream/main.js"></script>

    <script type="text/javascript">
        var _Hasync = _Hasync || [];
        _Hasync.push(['Histats.start', '1,4167851,4,0,0,0,00010000']);
        _Hasync.push(['Histats.fasi', '1']);
        _Hasync.push(['Histats.track_hits', '']);
        (function () {
            var hs = document.createElement('script');
            hs.type = 'text/javascript';
            hs.async = true;
            hs.src = ('//s10.histats.com/js15_as.js');
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
        })();

    </script>
    <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4167851&101" alt="hit counters"
                border="0"></a></noscript>

</body>

</html>
