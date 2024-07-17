@extends('layouts.app')

@section('content')


    <!-- header banner -->
    <div class="banner v__2">
        <div class="banner__wrapper">
            <div class="swiper  swiper-data" data-swiper='{
                        "slidesPerView":1,
                        "effect": "fade",
                        "loop": true,
                        "speed": 1000,
                        "autoplay":{
                            "delay":"7000"
                }}'>
                <div class="swiper-wrapper">
                    <!-- single slides -->
                    @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="banner__wrapper--bg"  style="background-image: url({{ asset($slider->slider_image) }})"> 
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner__slides--container banner__height">
                                            <div class="banner__slides--content">
                                                <div class="banner__slides--content--sub">
                                                    <img src="{{ asset($slider->slider_image)}}" alt="cap"> knowledge meets innovation
                                                </div>
                                                <h1 class="banner__slides--content--title">
                                                    Unleashing Potential
                                                    Fostering Excellence
                                                </h1>
                                                <a href="{{ url('/courses') }}" class="rts-theme-btn btn-arrow">View Our Program
                                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- single slides end -->     
                </div>
            </div>
            <div class="banner__slides--navigation">
                <div class="banner__slides--navigation--single">
                    <h5 class="nav__title">Our Programs</h5>
                    <a href="{{ url('/courses') }}" class="nav__description">Browse our acquirable skills</a>
                </div>
            </div>
        </div>
    </div>
    <!-- header banner end -->
    <!-- about us -->
    <section class="about v__2 pt--120 pb--80">
        <div class="container">
            <div class="row justify-content-md-center g-5">
                <div class="col-lg-6 col-md-9">
                    <div class="about__left--content">
                        <div class="about__left--content--left">
                            <img src="{{asset('frontAssets/images/about/about__h2-1.png')}}" alt="">
                        </div>
                        <div class="about__left--content--center">
                            <div class="rts__circle v__1">
                                <svg class="spinner" viewBox="0 0 100 100">
                                    <defs>
                                        <path id="circle" d="M50,50 m-37,0a37,37 0 1,1 74,0a37,37 0 1,1 -74,0"></path>
                                    </defs>
                                    <text>
                                        <textPath xlink:href="#circle">*Thomas Adewumi University * Estd. 2019 *Explore *
                                        </textPath>
                                    </text>
                                </svg>
                                <div class="rts__circle--icon">
                                    <i class="fa-light fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="about__left--content--right">
                            <img src="{{asset('frontAssets/images/about/about__h2-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="about__right--content">
                        <div class="about__right--content--sub">
                            <img src="{{asset('frontAssets/images/icon/e-cap-pix.svg')}}" alt="cap">
                            knowledge meets innovation
                        </div>
                        <h2 class="about__right--content--title">About Us </h2>
                        <p class="about__right--content--description"></p> {{strip_tags($about->about)}}</p>
                        <div class="about__right--content--vision">
                            <div class="mision">
                                <div class="mision__icon">
                                    <img src="{{asset('frontAssets/images/icon/mission.svg')}}" alt="">
                                </div>
                                <div class="mision__title">
                                    University Mission
                                    Statement
                                </div>
                            </div>
                            <div class="vision">
                                <div class="vision__icon">
                                    <img src="{{asset('frontAssets/images/icon/vission.svg')}}" alt="">
                                </div>
                                <div class="vision__title">
                                    University Vision
                                    Achievement
                                </div>
                            </div>
                        </div>
                        <a href="program-single.html" class="rts-theme-btn btn-arrow">View Our Program
                            <span><i class="fa-regular fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us end -->
   
    <!-- academic program -->
    <section class="program rts-section-padding">
        <div class="container">
            <div class="row rt-center">
                <div class="col-sm-12">
                    <div class="rts__section--wrapper v__5">
                        <h2 class="rts__section--title">Core Values</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center g-0">
                <div class="col-lg-4 col-md-10">
                    <div class="program__single--item">
                        <div class="program__single--item--bg">
                            <img src="{{asset('frontAssets/images/program/program__bg.jpg')}}" alt="">
                        </div>
                        <h5 class="program__single--item--title">Mission</h5>

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="/" class="link__list">mission
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-10">
                    <div class="program__single--item v__2">
                        <div class="program__single--item--bg">
                            <img src="{{asset('frontAssets/images/program/program__bg.jpg')}}" alt="">
                        </div>
                        <h5 class="program__single--item--title">Vision</h5>

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="/" class="link__list">vision
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-10">
                    <div class="program__single--item">
                        <div class="program__single--item--bg">
                            <img src="{{asset('frontAssets/images/program/program__bg.jpg')}}" alt="">
                        </div>
                        <h5 class="program__single--item--title">Community Imapact</h5>

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="/" class="link__list">Imapact
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- academic program end -->


     <!-- our program -->
     <section class="program rts-section-padding">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="rts__section--wrapper v__2">
                        <h2 class="rts__section--title text-capitalize">Our Programs</h2>
                        <p class="rts__section--description">Join us in an empowering program designed to elevate your skills and mindset. Experience personalized guidance and innovative learning, paving the way to your ultimate success.</p>
                        <div class="campus__vector">
                            <img src="assets/images/campus/campus__vector.svg" alt="">
                        </div>
                        <a href="" class="rts-theme-btn btn-arrow">View All Program
                            <span><i class="fa-regular fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-10 mt-5 mt-md-0">
                    <div class="row g-5">
                        <div class="col-lg-6 col-md-6">
                            <div class="program__content">
                                <div class="rts__program--item v__2" style="background-image: url(assets/images/program/program__1.jpg);">
                                    <h5 class="rts__program--item--title">Summer Program</h5>
                                    <p class="rts__program--item--description">Embark on a journey of knowledge discovery, and growth at Unipix University.</p>
                                    <a href="program-single.html" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </span></a>
                                    <h5 class="rts__program--item--title--show">Summer Program</h5>
                                </div>
                                <!-- second one -->
                                <div class="rts__program--item v__2" style="background-image: url(assets/images/program/program__2.jpg);">
                                    <h5 class="rts__program--item--title">Undergraduate</h5>
                                    <p class="rts__program--item--description">Embark on a journey of knowledge discovery, and growth at Unipix University.</p>
                                    <a href="program-single.html" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </span></a>
                                    <h5 class="rts__program--item--title--show">Undergraduate</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="program__content mt--85">
                                <div class="rts__program--item v__2" style="background-image: url(assets/images/program/program__3.jpg);">
                                    <h5 class="rts__program--item--title">Summer Program</h5>
                                    <p class="rts__program--item--description">Embark on a journey of knowledge discovery, and growth at Unipix University.</p>
                                    <a href="program-single.html" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </span></a>
                                    <h5 class="rts__program--item--title--show">Summer Program</h5>
                                </div>
                                <!-- second one -->
                                <div class="rts__program--item v__2" style="background-image: url(assets/images/program/program__4.jpg);">
                                    <h5 class="rts__program--item--title">Online Program</h5>
                                    <p class="rts__program--item--description">Embark on a journey of knowledge discovery, and growth at Unipix University.</p>
                                    <a href="program-single.html" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </span></a>
                                    <h5 class="rts__program--item--title--show">Online Program</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our program end -->

    {{-- <!-- campus life -->
    <section class="campus rts__primary__bg-2 rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__6">
                    <p class="rts__section--wrapper--description">
                        Building a vibrant community of creative and accomplished people from around the world
                    </p>
                    <h2 class="rts__section--wrapper--title">
                        Campus <span> Life</span>
                    </h2>
                </div>
            </div>
            <!-- content -->
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="campus__single--item">
                        <a href="campus-life.html">
                            <div class="campus__single--item--thumb">
                                <img src="{{asset('frontAssets/images/campus/01.jpg')}}" alt="">
                            </div>
                        </a>
                        <h5 class="campus__single--item--title"><a href="campus-life.html">Student Life <span><i class="fa-light fa-arrow-right"></i></span></a></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="campus__single--item">
                        <a href="campus-life.html">
                            <div class="campus__single--item--thumb">
                                <img src="{{asset('frontAssets/images/campus/02.jpg')}}" alt="">
                            </div>
                        </a>
                        <h5 class="campus__single--item--title"><a href="campus-life.html">Arts & Culture <span><i class="fa-light fa-arrow-right"></i></span></a></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="campus__single--item">
                        <a href="campus-life.html">
                            <div class="campus__single--item--thumb">
                                <img src="{{asset('frontAssets/images/campus/03.jpg')}}" alt="">
                            </div>
                        </a>
                        <h5 class="campus__single--item--title"><a href="campus-life.html">Recreation & Wellness <span><i class="fa-light fa-arrow-right"></i></span></a></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- shape area -->
        <div class="rts__shape">
            <img src="{{asset('frontAssets/images/icon/note_khata.svg')}}" class="rts__shape--1" alt="">
            <img src="{{asset('frontAssets/images/icon/book.svg')}}" class="rts__shape--2" alt="">
            <img src="{{asset('frontAssets/images/icon/compas_scale.svg')}}" class="rts__shape--3" alt="">
        </div>
    </section>
    <!-- campus life end --> --}}
    <!-- tution fee -->
    {{-- <section class="tution rts-section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-4">
                    <div class="rts__section--wrapper v__7">
                        <h2 class="rts__section--title">Tuition Fees at
                            Unipix University</h2>
                        <p class="rts__section--description">
                            At Unipix University Name we are committed to providing a high-quality education that is accessible to a diverse range of students.
                        </p>
                        <a href="tution-fee.html" class="rts-theme-btn btn-arrow">Plan Details
                            <span><i class="fa-regular fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tution__single--box v__1">
                        <h5 class="tution__single--box--title">Undergraduate Programs</h5>
                        <h6 class="tution__single--box--faculty">College of Arts and Sciences</h6>
                        <ul class="tution__single--box--feature">
                            <li>Full-Time Tuition (per semester): $241</li>
                            <li>Part-Time Tuition (per credit): $141</li>
                        </ul>
                        <h6 class="tution__single--box--faculty">School of Business</h6>
                        <ul class="tution__single--box--feature">
                            <li>Full-Time Tuition (per semester): $241</li>
                            <li>Part-Time Tuition (per credit): $141</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tution__single--box">
                        <h5 class="tution__single--box--title">Graduate Programs</h5>
                        <h6 class="tution__single--box--faculty">Graduate School/Department</h6>
                        <ul class="tution__single--box--feature">
                            <li>Full-Time Tuition (per semester): $241</li>
                            <li>Part-Time Tuition (per credit): $141</li>
                        </ul>
                        <h6 class="tution__single--box--faculty">Additional Fees</h6>
                        <ul class="tution__single--box--feature">
                            <li>Technology Fee: $149 per semester</li>
                            <li>Student Activity Fee: $99 per semester</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- research -->
     <section class="rts__section rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__3">
                    <h2 class="rts__section--title">Our Focus</h2>
                    <div class="rts__section--details">
                        <p class="rts__description">
                        1.	To create and promote entrepreneurial education and awareness/opportunities in the university <br>
                        2.	To foster entrepreneurship spirit among TAU undergraduates while exposing them to practical training and hands-on learning in entrepreneurship development.<br>
                        3.	To nurture entrepreneurship knowledge among TAU undergraduates. <br>
                        4.	To promote self-reliance, entrepreneurship, leadership, and capacity development skills among TAU undergraduates. <br>
                        5.	To enhance capacity potential and making self–employed and self-dependent students, thereby making employers of labor in TAU graduates to reduce the level of unemployment in the country.<br>
                        6.	To stimulate the development and growth of entrepreneurship in Nigeria.<br>
                        </p>
                        <!--<a href="research.html" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>-->
                        </span></a>
                    </div>
                </div>
            </div>
            <!-- research content -->
            <div class="row g-5">
                <!-- single item -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="rts__research--single">
                        <div class="rts__research--single--thumb">
                            <a href="research.html">
                                <img src="assets/images/research/01.jpg" alt="">
                            </a>
                        </div>
                        <div class="rts__research--single--meta">
                            <a class="rts__research--single--meta--title" href="research.html">Are Social Net Work Beneficial for our Society?</a>
                            <p class="rts__research--single--meta--excerpt">
                                The American Journal of Applied Scientific Research (AJASR): A Rigorous Peer-Reviewed Platform.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- research end -->


        <!-- team -->
        <section class="rts__section rts__light rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper">
                    <h2 class="rts__section--title">Facilitator</h2>
                </div>
            </div>
            <!-- team member area -->
            <div class="row g-5">
                @foreach($instructor as $instructors)
                <!-- single team -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="rts__single--member">
                        <div class="rts__single--member--thumb">
                            <a href="/">
                                <img src="{{asset($instructors->image)}}" alt="">
                            </a>
                        </div>
                        <div class="rts__single--member--meta">
                            <h5 class="rts__single--member--meta--title">
                                <a href="/">{{$instructors->name }}</a>
                            </h5>
                            <span class="rts__single--member--meta--designation">
                            {{$instructors->title }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <!-- team member area end -->
        </div>
    </section>
    <!-- team end -->
    <!-- student feedback -->
    <section class="feedback rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="rts__section--wrapper v__9">
                        <h2 class="rts__section--title">Our Feedbacks</h2>
                        <p class="rts__section--description">You'll find something to spark your curiosity and enhance</p>
                    </div>
                </div>
            </div>
            <!-- feedback slider -->
            <div class="row">
    <div class="col-lg-12">
        <div class="rts__testimonial--active swiper swiper-data" data-swiper='{
            "slidesPerView":3,
            "loop": true,
            "speed": 1000,
            "pagination":{
                "el":".rts__pagination",
                "clickable": true
            },
            "autoplay":{
                "delay":"7000"
            },
            "breakpoints":{
                "320":{
                    "slidesPerView": 1
                },
                "575":{
                    "slidesPerView": 1.5
                },
                "768":{
                    "slidesPerView": 2
                },
                "991":{
                    "slidesPerView": 2.2
                },
                "1201":{
                    "slidesPerView": 3
                }
            }
        }'>
            <div class="swiper-wrapper">
                @foreach($feedbacks as $feedback)
                <!-- single slide -->
                <div class="swiper-slide">
                    <div class="rts__single--testimonial">
                        <div class="rts__rating--star">
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                            <i class="fa-sharp fa-light fa-star"></i>
                        </div>
                        <p class="rts__single--testimonial--text">
                            {{ $feedback->feedback }}
                        </p>
                        <div class="rts__single--testimonial--author">
                            <div class="rts__single--testimonial--author--meta">
                                <div class="rts__author--img">
                                    <img src="{{ asset($feedback->image) }}" alt="author">
                                    <h5 class="mb-0" style="white-space: nowrap;">{{ $feedback->name }}</h5>
                                    <span class="designation">{{ $feedback->title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slide end -->
                @endforeach
            </div>
            <div class="rts__pagination v__1"></div>
        </div>
    </div>
</div>
</div>
</section>
<!-- student feedback end -->

{{-- <!-- brand slider -->
<div class="rts-brand v_1 pb--85 pt--85">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-11">
                <div class="rts-brand-slider swiper swiper-data" data-swiper='{
                "slidesPerView":6,
                "loop": true,
                "autoplay":{
                    "delay":"3000"
                },
                "breakpoints":{
                    "320":{
                        "slidesPerView": 3,
                        "centeredSlides": true
                    },
                    "575":{
                        "slidesPerView": 4,
                        "centeredSlides": true
                    },
                    "768":{
                        "slidesPerView": 5,
                        "centeredSlides": true
                    },
                    "991":{
                        "slidesPerView": 6,
                        "centeredSlides": true
                    },
                    "1201":{
                        "slidesPerView": 6
                    }
                }
        }'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="single-brand-logo">
                                <a href="#">
                                    <img src="frontAssets/images/brand/01.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand slider end --> --}}


@endsection