@extends('layouts.app')

@section('content')

 <!-- BREADCRUMB AREA -->
 <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/banner/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">about</li>
                        </ul>
                        <h2 class="section-title">About Unipix University</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- about university -->
    <section class="rts-about-university rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts-section">
                    <div class="col-lg-4 col-md-5">
                        <h3 class="rts-section-title">About University</h3>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <p class="rts-section-description">
                            Welcome to Unipix University, where knowledge meets inspiration, and every individual's educational journey is valued. Established in 1971 Establishment, our university has been a bastion of learning, innovation, and community for 51 years years.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-5 justify-content-md-center justify-content-start">
                <div class="col-lg-7 col-xl-8 col-md-11">
                    <div class="rts-about-section">
                        <img src="{{asset('frontAssets/images/about/about-01.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 col-md-11">
                    <div class="rts-about-details">
                        <div class="single-about-info">
                            <div class="content">
                                <h3 class="title">20,000</h3>
                                <img src="{{asset('frontAssets/images/icon/11.svg')}}" alt="">
                            </div>
                            <div class="desc">
                                <p>undergraduate and graduate students</p>
                            </div>
                        </div>
                        <div class="single-about-info">
                            <div class="content">
                                <h3 class="title">16,214</h3>
                                <img src="{{asset('frontAssets/images/icon/12.svg')}}" alt="">
                            </div>
                            <div class="desc">
                                <p>Unipix University Faculty and Staff</p>
                            </div>
                        </div>
                        <div class="single-about-info">
                            <div class="content">
                                <h3 class="title">300k</h3>
                                <img src="{{asset('frontAssets/images/icon/13.svg')}}" alt="">
                            </div>
                            <div class="desc">
                                <p>Unipix Alumni Worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about university end -->

    <!-- history -->
    <div class="rts-history">
        <div class="container">
            <div class="row g-5 justify-content-md-center justify-content-start align-items-center">
                <div class="col-lg-6 col-md-11">
                    <div class="rts-history-image">
                        <img src="{{asset('frontAssets/images/about/history.jpg')}}" alt="history">
                    </div>
                </div>
                <div class="col-lg-6 col-md-11">
                    <div class="rts-history-section">
                        <h4 class="rts-section-title mb--40">The history of Unipix</h4>
                        <p>
                            On September 8, 1971, Unipix, the first college in the American colonies, was founded in Cambridge, Massachusetts. Unipix University was officially founded by a vote by the Great and General Court of the Massachusetts Bay Colony.
                            <span class="d-block mb--30"></span>
                            Unipix endowment started with John Unipix initial donation of 400 books and half his estate, but in 1721, Thomas Hollis began the now standard practice of requiring that a donation be used for a specific purpose when he donated money for “a Divinity Professor, to read lectures in the Halls to the students.”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- history end-->


    <div class="rts-funfact rts-section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    <div class="rts-funfact-wrapper">
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">90%</h2>
                            <p>post-graduation success rate</p>
                        </div>
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">Top 10</h2>
                            <p>Colleges that Create Futures</p>
                        </div>
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">No. 1</h2>
                            <p>in the nation for materials R&D</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- mission -->
    <section class="rts-mission">
        <div class="container">
            <div class="row justify-content-center rt-center">
                <div class="rts-section mb--50">
                    <h2 class="rts-section-title">Mission and Values</h2>
                </div>
            </div>
            <!-- mission -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="rts-timeline-section">
                        <div class="rts-timeline-content">
                            <div class="left-side">
                                <div class="single-timeline-item">
                                    <h5 class="timeline-title">Diversity</h5>
                                    <p> Celebrating a rich tapestry of backgrounds,
                                        perspectives, and talents
                                    </p>
                                    <img src="{{asset('frontAssets/images/about/mission-1.jpg')}}" alt="">
                                </div>
                                <div class="single-timeline-item">
                                    <h5 class="timeline-title">Innovation</h5>
                                    <p> Encouraging creativity, critical thinking, and a
                                        spirit of innovation.
                                    </p>
                                    <img src="{{asset('frontAssets/images/about/mission-2.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="separator">
                            </div>
                            <div class="right-side">
                                <div class="single-timeline-item">
                                    <h5 class="timeline-title">Excellence</h5>
                                    <p> Striving for academic and research excellence
                                        in all endeavors.
                                    </p>
                                    <img src="{{asset('frontAssets/images/about/mission-3.jpg')}}" alt="">
                                </div>
                                <div class="single-timeline-item">
                                    <h5 class="timeline-title">Academic Excellence</h5>
                                    <p> Our commitment to academic excellence is reflected in
                                        the diverse range
                                    </p>
                                    <img src="{{asset('frontAssets/images/about/mission-4.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- mission end-->
    <section class="rts-campus-tour rts-section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title rt-center mb--50">Our Campus Tour</h2>
                <div class="col-12">
                    <div class="rts-video-section height-500 mb--50">
                        <a href="https://www.youtube.com/watch?v=Uwq1uiuM_9w" class="rts-video-section-player popup-video video-btn">
                            <i class="fa-sharp fa-solid fa-play"></i>
                        </a>
                        <img src="{{asset('frontAssets/images/about/video-thumb.jpg')}}" alt="video-bg">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="rts-video-section-text rt-center mx-3">
                        <p>Embark on a journey of knowledge, discovery, and growth at Unipix University. Our admissions process is designed to identify bright, motivated individuals who are eager to contribute to our dynamic academic community. Whether you're a recent high school graduate or a transfer student seeking a new academic home, we invite you to explore the possibilities that await you.</p>
                        <a href="campus-life.html" class="mt--15 about-btn rts-nbg-btn btn-arrow">Visit Campus <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Start -->
    <div class="rts-testimonial rts-section-padding">
        <div class="container">
            <!-- testimonial content -->
            <div class="row">
                <div class="col-12">
                    <div class="rts-testimonial-box">
                        <div class="testimonial-item rt-flex">
                            <div class="testimonial-item-image">
                                <img src="{{asset('frontAssets/images/testimonial/testimonial-big.jpg')}}" alt="testimonial thumbnail">
                            </div>
                            <div class="testimonial-item-content w-570 rt-relative">
                                <div class="swiper swiper-data" data-swiper='{
                                        "slidesPerView":1,
                                        "loop": true,
                                        "navigation":{
                                            "nextEl":".rt-next",
                                            "prevEl":".rt-prev"
                                        },
                                        "autoplay":{
                                            "delay":"3000"
                                        }
                                }'>
                                    <div class="swiper-wrapper">
                                        <!-- single testimonial -->
                                        <div class="swiper-slide">
                                            <div class="single-testimonial">
                                                <div class="rt-between mb--50">
                                                    <div class="rt-icon">
                                                        <img src="{{asset('frontAssets/images/testimonial/quote.svg"')}} alt="quote icon">
                                                    </div>
                                                    <div class="rt-review">
                                                        <div class="rating-star mb--10">
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-light fa-star"></i>
                                                        </div>
                                                        <p class="rt-secondary rt-medium --p-s">4.5 ( 112 Review)</p>
                                                    </div>
                                                </div>
                                                <p class="testimonial-text">
                                                    I would highly recommend Michael Richard to anyone interested the subject matter. It has provided me with invaluable knowledge & a newfound passion topic. My only suggestion would be to add more live.
                                                </p>
                                                <div class="rt-testimonial-author mt--50">
                                                    <div class="rt-author-meta rt-flex rt-gap-20">
                                                        <div class="rt-author-img">
                                                            <img src="{{asset('frontAssets/images/testimonial/author-1.png')}}" alt="author">
                                                        </div>
                                                        <div class="rt-author-info">
                                                            <h5 class="mb-1">David Jhon</h5>
                                                            <p>Artist and Instructor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single testimonial -->
                                        <div class="swiper-slide">
                                            <div class="single-testimonial">
                                                <div class="rt-between mb--50">
                                                    <div class="rt-icon">
                                                        <img src="{{asset('frontAssets/images/testimonial/quote.svg')}}" alt="quote icon">
                                                    </div>
                                                    <div class="rt-review">
                                                        <div class="rating-star mb--10">
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-light fa-star"></i>
                                                        </div>
                                                        <p class="rt-secondary rt-medium --p-s">4.5 ( 112 Review)</p>
                                                    </div>
                                                </div>
                                                <p class="testimonial-text">
                                                    I would highly recommend Michael Richard to anyone interested the subject matter. It has provided me with invaluable knowledge & a newfound passion topic. My only suggestion would be to add more live.
                                                </p>
                                                <div class="rt-testimonial-author mt--50">
                                                    <div class="rt-author-meta rt-flex rt-gap-20">
                                                        <div class="rt-author-img">
                                                            <img src="assets/images/testimonial/author-1.png" alt="author">
                                                        </div>
                                                        <div class="rt-author-info">
                                                            <h5 class="mb-1">David Jhon</h5>
                                                            <p>Artist and Instructor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single testimonial -->
                                        <div class="swiper-slide">
                                            <div class="single-testimonial">
                                                <div class="rt-between mb--50">
                                                    <div class="rt-icon">
                                                        <img src="assets/images/testimonial/quote.svg" alt="quote icon">
                                                    </div>
                                                    <div class="rt-review">
                                                        <div class="rating-star mb--10">
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-solid fa-star"></i>
                                                            <i class="fa-sharp fa-light fa-star"></i>
                                                        </div>
                                                        <p class="rt-secondary rt-medium --p-s">4.5 ( 112 Review)</p>
                                                    </div>
                                                </div>
                                                <p class="testimonial-text">
                                                    I would highly recommend Michael Richard to anyone interested the subject matter. It has provided me with invaluable knowledge & a newfound passion topic. My only suggestion would be to add more live.
                                                </p>
                                                <div class="rt-testimonial-author mt--50">
                                                    <div class="rt-author-meta rt-flex rt-gap-20">
                                                        <div class="rt-author-img">
                                                            <img src="assets/images/testimonial/author-1.png" alt="author">
                                                        </div>
                                                        <div class="rt-author-info">
                                                            <h5 class="mb-1">David Jhon</h5>
                                                            <p>Artist and Instructor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- rts arrow -->
                                <div class="rts-slider-arrow testimonial-arrow">
                                    <div class="rt-slider-btn rt-next">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </div>
                                    <div class="rt-slider-btn rt-prev">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial end -->



<!-- Mirrored from html.themewant.com/unipix/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 09:21:55 GMT -->
@endsection