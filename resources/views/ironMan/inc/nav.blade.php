<div class="menu-area menu-sticky">
                <div class="container">
                    <div class="row rs-vertical-middle">
                        <div class="col-lg-2">
                            <div class="logo-area">
                                <a class="f-logo" href="{{url('/')}}"><img src="{{asset('storage/logo/'.get_option('logo'))}}" alt="logo"></a>
                                <a class="s-logo" href="{{url('/')}}"><img src="{{asset('storage/logo/'.get_option('logo2'))}}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-10 mobile-menu-area">
                            <div class="rs-menu-area display-flex-center">
                                <div class="main-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <nav class="rs-menu">
                                        <ul class="nav-menu text-right">
                                            <!-- Home -->
                                            <<li class="{{Route::currentRouteName() == 'front.home' ? 'current-menu-item' : ''}} current_page_item menu-item-has-children"> <a href="{{url('/')}}" class="home">Home</a>
                                            </li>
                                            <!-- End Home -->
                                            <!--News Start-->
                                            <li class="{{Route::currentRouteName() == 'dmca' ? 'current-menu-item' : ''}} "> <a href="{{route('dmca')}}">DMCA</a></li>
 
                                            @foreach ($all_category as $category) 
                                            <li class="menu-item-has-children {{(isset($banner_image)  && $banner_image->cat_slug_name == $category->cat_slug_name) ? 'current-menu-item ': ''}}"><a href="javascript:void(0)">{{$category->cat_name}}</a>
                                                @if ($category->sub_category->count() > 0)
                                                    <ul class="sub-menu">
                                                        @foreach ($category->sub_category as $sub_categorys)
                                                            <li><a href="{{route('subcategory',$sub_categorys->subcat_slug_name)}}">{{$sub_categorys->subcat_name}}</a></li> 
                                                        @endforeach
                                                        <div class="sub-menu-close"><i class="fa fa-times"
                                                        aria-hidden="true"></i>Close</div>
                                                    </ul>  
                                                @endif
                                            </li> 
                                            @endforeach

                                            <!--Contact Menu Start-->
                                            <li class="last-item {{Route::currentRouteName() == 'contact' ? 'current-menu-item' : ''}} "><a href="{{route('contact')}}">Contact Us</a></li>
                                            <!--Contact Menu End-->
                                        </ul> <!-- //.nav-menu -->
                                    </nav>
                                </div> <!-- //.main-menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>