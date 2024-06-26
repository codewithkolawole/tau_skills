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
                    <div class="swiper-slide">
                        <div class="banner__wrapper--bg" style="background-image: url(frontAssets/images/banner/01.jpg);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner__slides--container banner__height">
                                            <div class="banner__slides--content">
                                                <div class="banner__slides--content--sub">
                                                    <img src="{{asset('frontAssets/images/icon/e-cap.svg')}}" alt="cap"> knowledge meets
                                                    innovation
                                                </div>
                                                <h1 class="banner__slides--content--title">
                                                    Unleashing Potential
                                                    Fostering Excellence
                                                </h1>
                                                <a href="{{ url('/program') }}" class="rts-theme-btn btn-arrow">View Our Program
                                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single slides end -->
                    <!-- single slides -->
                    <div class="swiper-slide">
                        <div class="banner__wrapper--bg" style="background-image: url(frontAssets/images/banner/02.jpg);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner__slides--container banner__height">
                                            <div class="banner__slides--content">
                                                <div class="banner__slides--content--sub">
                                                    <img src="{{asset('frontAssets/images/icon/e-cap.svg')}}" alt="cap"> knowledge meets
                                                    innovation
                                                </div>
                                                <h1 class="banner__slides--content--title">
                                                    Unleashing Potential
                                                    Fostering Excellence
                                                </h1>
                                                <a href="{{ url('/program') }}" class="rts-theme-btn btn-arrow">View Our Program
                                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single slides end -->
                </div>
            </div>
            <div class="banner__slides--navigation">
                <div class="banner__slides--navigation--single">
                    <h5 class="nav__title">Our Programs</h5>
                    <a href="{{ url('/program') }}" class="nav__description">Browse our acquirable skills</a>
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
                        <h2 class="about__right--content--title">About University</h2>
                        <p class="about__right--content--description">At Unipix University, we believe in the
                            transformative power of education and the boundless potential that resides within each
                            individual.</p>
                        <p class="about__right--content--description">Our mission is to foster intellectual curiosity,
                            empower individuals to realize their fullest potential, and contribute meaningfully to the
                            betterment of society. commitment to academic excellence, diversity, and community
                            engagement.</p>
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
                        <h2 class="rts__section--title">Academics & Program</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center g-0">
                <div class="col-lg-4 col-md-10">
                    <div class="program__single--item">
                        <div class="program__single--item--bg">
                            <img src="{{asset('frontAssets/images/program/program__bg.jpg')}}" alt="">
                        </div>
                        <h5 class="program__single--item--title">undergraduate</h5>

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Anthropology
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Applied Mathematics
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Biomedical Engineering
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Astrophysics
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
                        <h5 class="program__single--item--title">graduate</h5>

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Applied Computation
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Applied Mathematics
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Applied Computation
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Architecture
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
                        <h5 class="program__single--item--title">Lifelong Learning</h5>

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Personal Development
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Arts and Humanities
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Health and Wellness
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Social Sciences
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
    <!-- tution fee end -->
    {{-- <!-- scholarship appication -->
    <section class="rts-scholarship rts-scholarship-bg rts-section-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="rts-scholarship-info">
                        <h2 class="rts-section-title">Scholarships and Financial Aid</h2>
                        <p class="w-740 mb--50">Each semester, Brac University is proud to honor academically talented and exceptionally skilled students with a variety of scholarships and awards. The university annually awards more than 100 million takas as scholarships to both undergraduate and postgraduate students.</p>
                        <a href="scholarship.html" class="rts-theme-btn btn-arrow">Know More<span><i class="fa-thin fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- scholarship appication end --> --}}

    <!-- notice board start -->
    <section class="rts-notice rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__8">
                    <h2 class="rts__section--title">Alumni Event</h2>
                    <div class="rts__section--link">
                        <a href="event.html" class="rts-nbg-btn btn-arrow">View All
                            <span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                        </span></a>
                    </div>
                </div>
            </div>
            <div class="row g-0 justify-content-md-center">
                <div class="col-md-11 col-lg-7">
                    <div class="rts-event-section">
                        <div class="rts-event-section-content">
                            <ul class="list-unstyled rts-counter">
                                <li class="single-event">
                                    <div class="single-event-counter">
                                        <div class="count-number rt-clip-text"></div>
                                    </div>
                                    <div class="single-event-content">
                                        <h5 class="event-title">Diversity, Equity, and Inclusion</h5>
                                        <div class="single-event-content-meta">
                                            <div class="event-date">
                                                <span><i class="fal fa-calendar"></i></span>
                                                <span>November 28, 2023</span>
                                            </div>

                                            <div class="event-time">
                                                <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                                <span>10:30 am</span>
                                            </div>
                                            <div class="event-place">
                                                <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                                                <span>Yarra Park, UK</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="single-event">
                                    <div class="single-event-counter">
                                        <div class="count-number rt-clip-text"></div>
                                    </div>
                                    <div class="single-event-content">
                                        <h5 class="event-title">Talking Money With Kids and Teens</h5>
                                        <div class="single-event-content-meta">
                                            <div class="event-date">
                                                <span><i class="fal fa-calendar"></i></span>
                                                <span>November 28, 2023</span>
                                            </div>
                                            <div class="event-time">
                                                <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                                <span>10:30 am</span>
                                            </div>
                                            <div class="event-place">
                                                <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                                                <span>Yarra Park, UK</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="single-event">
                                    <div class="single-event-counter">
                                        <div class="count-number rt-clip-text"></div>
                                    </div>
                                    <div class="single-event-content">
                                        <h5 class="event-title">Planning for College After Affirmative Action</h5>
                                        <div class="single-event-content-meta">
                                            <div class="event-date">
                                                <span><i class="fal fa-calendar"></i></span>
                                                <span>November 28, 2023</span>
                                            </div>
                                            <div class="event-time">
                                                <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                                <span>10:30 am</span>
                                            </div>
                                            <div class="event-place">
                                                <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                                                <span>Yarra Park, UK</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 col-lg-5">
                    <div class="event__background">
                        <img src="frontAssets/images/event/event__bg.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- notice board end -->
    <!-- student feedback -->
    <section class="feedback rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="rts__section--wrapper v__9">
                        <h2 class="rts__section--title">My Students Feedback</h2>
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
                                        I can't recommend The Gourmet Haven enough. It's a place for special date in nights, or whenever you're in the mood for a culinary.
                                    </p>
                                    <div class="rts__single--testimonial--author">
                                        <div class="rts__single--testimonial--author--meta">
                                            <div class="rts__author--img">
                                                <img src="frontAssets/images/testimonial/author-1.png" alt="author">
                                            </div>
                                            <div class="rts__author--info">
                                                <h5 class="mb-0">Emma Elizabeth</h5>
                                                <span class="designation">Assistant Teacher</span>
                                            </div>
                                        </div>
                                        <div class="rts__single--testimonial--quote">
                                            <img src="frontAssets/images/testimonial/quote.svg" alt="quote">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single slide end -->
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
                                        I can't recommend The Gourmet Haven enough. It's a place for special date in nights, or whenever you're in the mood for a culinary.
                                    </p>
                                    <div class="rts__single--testimonial--author">
                                        <div class="rts__single--testimonial--author--meta">
                                            <div class="rts__author--img">
                                                <img src="frontAssets/images/testimonial/author-2.png" alt="author">
                                            </div>
                                            <div class="rts__author--info">
                                                <h5 class="mb-0">Samantha Willow</h5>
                                                <span class="designation"> Teacher</span>
                                            </div>
                                        </div>
                                        <div class="rts__single--testimonial--quote">
                                            <img src="frontAssets/images/testimonial/quote.svg" alt="quote">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single slide end -->
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
                                        I can't recommend The Gourmet Haven enough. It's a place for special date in nights, or whenever you're in the mood for a culinary.
                                    </p>
                                    <div class="rts__single--testimonial--author">
                                        <div class="rts__single--testimonial--author--meta">
                                            <div class="rts__author--img">
                                                <img src="frontAssets/images/testimonial/author-3.png" alt="author">
                                            </div>
                                            <div class="rts__author--info">
                                                <h5 class="mb-0">Zent Ekizie</h5>
                                                <span class="designation">Assistant Teacher</span>
                                            </div>
                                        </div>
                                        <div class="rts__single--testimonial--quote">
                                            <img src="frontAssets/images/testimonial/quote.svg" alt="quote">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single slide end -->
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
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="frontAssets/images/brand/02.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="frontAssets/images/brand/03.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="frontAssets/images/brand/04.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="frontAssets/images/brand/05.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="frontAssets/images/brand/06.svg" alt="">
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