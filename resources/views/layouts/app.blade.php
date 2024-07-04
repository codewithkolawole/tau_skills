
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - {{ env('APP_DESCRIPTION') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontAssets/images/fav.png')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/plugins/animate.min.css')}}">
    <!-- fontawesome 6.4.2 -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/plugins/fontawesome.min.css')}}">
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/vendor/bootstrap.min.css')}}">
    <!-- swiper Css 10.2.0 -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/plugins/swiper.min.css')}}">
    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/vendor/magnific-popup.css')}}">
    <!-- metismenu scss -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/vendor/metismenu.css')}}">
    <!-- nice select js -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontAssets/css/plugins/jquery-ui.css')}}">
    <!-- custom style css -->
    <link rel="stylesheet" href="{{asset('frontAssets/css/style.css')}}">
    
</head>

<body>
    <!-- header area start -->
   <!-- header area start -->
   <header class="header header__sticky v__2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="header__wrapper">
                    <div class="header__logo">
                        <a href="{{ url('/') }}" class="header__logo--link">
                            <img src="{{ !empty($pageGlobalData->setting)? asset($pageGlobalData->setting->header_logo) : null}}" alt="{{ env('APP_NAME') }}" width="180">
                        </a>
                    </div>
                    <div class="header__menu">
                        <div class="navigation">
                            <nav class="navigation__menu">
                                <ul>
                                    <li class="navigation__menu--item">
                                        <a href="{{ url('/') }}" class="navigation__menu--item__link">Home</a>
                                    </li>

                                    <li class="navigation__menu--item">
                                        <a href="{{ url('/about') }}" class="navigation__menu--item__link">About</a>
                                    </li>

                                    <li class="navigation__menu--item">
                                        <a href="{{ url('/courses') }}" class="navigation__menu--item__link">Courses</a>
                                    </li>

                                    <li class="navigation__menu--item">
                                        <a href="{{ url('/gallery') }}" class="navigation__menu--item__link">Gallery</a>
                                    </li>

                                    <li class="navigation__menu--item">
                                        <a href="{{ url('/contact') }}" class="navigation__menu--item__link">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header__right">
                        <div class="header__right--item">
                            <div id="menu-btn" class="menu__trigger">
                                <i class="fa fa-sharp fa-light fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <!-- header area end -->
    @yield('content')
    <!-- footer start -->
    <footer class="rts-footer rts-footer-padding v_2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="rts-footer-newsletter">
                    <div class="col-lg-10">
                        <div class="rts-newsletter-box-content">
                            <h4 class="newsletter-title">Subscribe To Newsletter
                            </h4>
                            <div class="newsletter-form w-530">
                                <form action="#">
                                    <input type="email" name="subscription" id="subscription" placeholder="Enter Your mail" required="">
                                    <button type="submit" class="rts-nbg-btn btn-arrow">Subscribe <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-5 gy-lg-0">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="rts-footer-widget w-320">
                        <a href="{{ url('/') }}" class="d-block rts-footer-logo mb--40">
                            <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->footer_logo) : null }}" alt="{{ env('APP_NAME') }}" width="180">
                        </a>
                        {{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->description : null }}
                        <div class="rts-contact-link">
                            <a href="mailto:{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->email: null }}"><i class="fa-sharp fa-light fa-location-dot"></i> {{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->address : null }} </a>
                            <a href="callto:{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->phone_number: null }}"><i class="fa-thin fa-phone"></i> {{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->phone_number : null }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="rts-footer-widget ">
                        <h6 class="rt-semi">Our Campus</h6>
                        <div class="rts-footer-menu">
                            <ul>
                                <li><a href="academic.html">Academic</a></li>
                                <li><a href="athletics.html">Athletics</a></li>
                                <li><a href="campus-life.html">Campus life</a></li>
                                <li><a href="reasearch.html">Research</a></li>
                                <li><a href="academic-area.html">Academic Area</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <div class="rts-footer-widget ml--30">
                        <h6 class="rt-semi">Our Campus</h6>
                        <div class="rts-footer-menu">
                            <ul>
                                <li><a href="about.html">About </a></li>
                                <li><a href="tution-fee.html">Tution Fee</a></li>
                                <li><a href="alumni.html">Alumni</a></li>
                                <li><a href="faculty.html">Faculty Staff</a></li>
                                <li><a href="event.html">Event</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="rts-footer-widget ml--30">
                        <h6 class="rt-semi">Recent Post</h6>
                        <div class="rts-post-widget">
                            <ul class="list-unstyled">
                                <li class="single-post">
                                    <a href="blog-details.html" class="blog-thumb">
                                        <img src="assets/images/blog/w-1.jpg" alt="latest post">
                                    </a>
                                    <div class="post-content">
                                        <span class="rt-date">October 29, 2023</span>
                                        <a href="blog-details.html">
                                            Avoid These 4 Common When Managing Remote Teams
                                        </a>
                                    </div>
                                </li>
                                <li class="single-post">
                                    <a href="blog-details.html" class="blog-thumb">
                                        <img src="assets/images/blog/small-thumb-1.jpg" alt="latest post">
                                    </a>
                                    <div class="post-content">
                                        <span class="rt-date">October 29, 2023</span>
                                        <a href="blog-details.html">
                                            Avoid These 4 Common When Managing Remote Teams
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="rts-footer-copy-right v_1">
        <div class="container">
            <div class="row">
                <div class="rt-center">
                    <p class="--p-xs">Copyright &copy; {{ date('Y') }} All Rights Reserved by <a href="{{ url('/') }}">{{ env('APP_NAME') }}</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer end -->
    <!-- offcanvase menu -->
    <!-- header style two -->
    <div id="side-bar" class="side-bar">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <!-- inner menu area desktop start -->
        <div class="inner-main-wrapper-desk">
            <div class="thumbnail">
                <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->header_logo) : null }}" alt="{{ env('APP_NAME') }}">
            </div>
            <div class="inner-content">
                <p class="disc">
                    {!! $pageGlobalData->setting->description !!}
                </p>
                <!-- offcanvase banner -->
                <div class="offcanvase__banner mt--50">
                    <div class="offcanvase__banner--content">
                        <img src="{{ env('APPLY_IMAGE_URL') }}" alt="offcanvase">
                        <a href="admission.html" class="rts-theme-btn">Apply Now</a>
                    </div>
                </div>
                <div class="offcanvase__info">
                    <div class="offcanvase__info--content">
                        <a href="callto:+61485826710"><span><i class="fa-sharp fa-light fa-phone"></i></span>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->phone_number : null }}</a>
                        <a href="#"><span><i class="fa-sharp fa-light fa-location-dot"></i></span>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->address : null }}</a>
                        <div class="offcanvase__info--content--social">
                            <p class="title">Follow Us:</p>
                            <div class="social__links">
                                <a href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->facebook : null }}"><i class="fa-brands fa-facebook"></i></a>
                                <a href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->instagram : null }}"><i class="fa-brands fa-instagram"></i></a>
                                <a href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->linkedin : null }}"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->twitter : null }}"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu area start -->
        <div class="mobile-menu-main">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">
                    <li class="navigation__menu--item">
                        <a href="#" class="navigation__menu--item__link">Home</a>
                    </li>
                    
                    <li class="has-droupdown">
                        <a href="#" class="main">Pages</a>
                        <ul class="submenu mm-collapse">
                            <li><a class="mobile-menu-link" href="about.html">About Us</a></li>
                            <li><a class="mobile-menu-link" href="athletics.html">Athletics</a></li>
                            <li class="has-dropdown third-lvl">
                                <a href="javascript:void(0);">Faculty</a>
                                <ul class="submenu third-lvl base">
                                    <li><a class="mobile-menu-link" href="faculty.html">Faculty</a></li>
                                    <li><a class="mobile-menu-link" href="faculty-details.html">Faculty details</a></li>
                                </ul>
                            </li>
                            <li><a class="mobile-menu-link" href="research.html">Research</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown">
                        <a href="#" class="main">Academics</a>
                        <ul class="submenu mm-collapse">
                            <li><a class="mobile-menu-link" href="academic.html">Academic</a></li>
                            <li><a class="mobile-menu-link" href="admission.html">Admission</a></li>
                            <li><a class="mobile-menu-link" href="academic-area.html">Academic Area</a></li>
                            <li><a class="mobile-menu-link" href="campus-life.html">Campus Life</a></li>
                            <li><a class="mobile-menu-link" href="scholarship.html">Scholarship</a></li>
                            <li><a class="mobile-menu-link" href="tution-fee.html">Tution Fee</a></li>
                            <li><a class="mobile-menu-link" href="alumni.html">Alumni</a></li>
                            <li><a class="mobile-menu-link" href="program-single.html">Program Single</a></li>
                        </ul>
                    </li>

                    <li class="has-droupdown">
                        <a href="#" class="main">Events</a>
                        <ul class="submenu mm-collapse">
                            <li><a class="mobile-menu-link" href="event.html">Event</a></li>
                            <li><a class="mobile-menu-link" href="event-details.html">Event Details</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown">
                        <a href="#" class="main">Blog</a>
                        <ul class="submenu mm-collapse">
                            <li><a class="mobile-menu-link" href="blog.html">Blog</a></li>
                            <li><a class="mobile-menu-link" href="blog-grid.html">Blog Grid</a></li>
                            <li><a class="mobile-menu-link" href="blog-list.html">Blog List</a></li>
                            <li><a class="mobile-menu-link" href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="main">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <div class="offcanvase__info--content mt--30">
                <a href="callto:+61485826710"><span><i class="fa-sharp fa-light fa-phone"></i></span>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->phone_number : null }}</a>
                <a href="#"><span><i class="fa-sharp fa-light fa-location-dot"></i></span>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->address : null }}</a>
                <div class="offcanvase__info--content--social">
                    <p class="title">Follow Us:</p>
                    <div class="social__links">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu area end -->
    </div>
    <!-- header style two End -->

    <div class="search-input-area">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input class="search-input autocomplete ui-autocomplete-input" type="text" placeholder="Search by keyword or #" autocomplete="off">
                    <button><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>
    <!-- rts backto top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>
    <!-- rts back to top end -->
    <div id="anywhere-home" class="">
    </div>


    <!-- scripts -->
    <!-- jquery js -->
    <script src="{{asset('frontAssets/js/vendor/jquery.min.js')}}"></script>
    <!-- bootstrap 5.0.2 -->
    <script src="{{asset('frontAssets/js/plugins/bootstrap.min.js')}}"></script>
    <!-- jquery ui js -->
    <script src="{{asset('frontAssets/js/vendor/jquery-ui.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('frontAssets/js/vendor/waw.js')}}"></script>
    <!-- mobile menu -->
    <script src="{{asset('frontAssets/js/vendor/metismenu.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{asset('frontAssets/js/vendor/magnifying-popup.js')}}"></script>
    <!-- swiper JS 10.2.0 -->
    <script src="{{asset('frontAssets/js/plugins/swiper.js')}}"></script>
    <!-- counterup -->
    <script src="{{asset('frontAssets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('frontAssets/js/vendor/waypoint.js')}}"></script>
    <!-- isotop mesonary -->
    <script src="{{asset('frontAssets/js/plugins/isotop.js')}}"></script>
    <script src="{{asset('frontAssets/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontAssets/js/plugins/sticky-sidebar.js')}}"></script>
    <script src="{{asset('frontAssets/js/plugins/resize-sensor.js')}}"></script>
    <script src="{{asset('frontAssets/js/plugins/twinmax.js')}}"></script>
    <!-- dymanic Contact Form -->
    <script src="{{asset('frontAssets/js/plugins/contact.form.js')}}"></script>
    <script src="{{asset('frontAssets/js/plugins/nice-select.min.js')}}"></script>
    <!-- main Js -->
    <script src="{{asset('frontAssets/js/main.js')}}"></script>

</body>

</html>