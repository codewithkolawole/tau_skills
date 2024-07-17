@extends('layouts.app')

@section('content')

<!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url({{ !empty($pageGlobalData->setting)? asset($pageGlobalData->setting->banner) : null}})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">about</li>
                        </ul>
                        <h2 class="section-title">About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    @if(!empty($about))
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
                        {{ strip_tags($about->about) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-5 justify-content-md-center justify-content-start">
                <div class="col-lg-7 col-xl-8 col-md-11">
                    <div class="rts-about-section">
                        <img src="{{asset($about->image)}}" alt="event thumbnail">
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 col-md-11">
                    <div class="rts-about-details">
                        <div class="single-about-info">
                            <div class="content">
                                <h3 class="title">1000</h3>
                                <img src="{{ asset('frontAssets/images/icon/11.svg"') }} alt="">
                            </div>
                            <div class="desc">
                                <p>undergraduate and graduate students</p>
                            </div>
                        </div>
                        <div class="single-about-info">
                            <div class="content">
                                <h3 class="title">214</h3>
                                <img src="{{ asset('frontAssets/images/icon/12.svg') }}" alt="">
                            </div>
                            <div class="desc">
                                <p>{{ env('APP_NAME') }} Faculty and Staff</p>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about university end -->
    @endif

    @if(!empty($about))
    <!-- history -->
    <div class="rts-history">
        <div class="container">
            <div class="row g-5 justify-content-md-center justify-content-start align-items-center">
                <div class="col-lg-6 col-md-11">
                    <div class="rts-history-image">
                        <img src="{{asset($about->history_image)}}" alt="history">
                    </div>
                </div>
                <div class="col-lg-6 col-md-11">
                    <div class="rts-history-section">
                        <h4 class="rts-section-title mb--10">{{ env('APP_NAME') }} History</h4>
                        <p class="rts-section-description">
                             {!! $about->history !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- history end-->
    @endif


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


    @if(!empty($missions))
    <!-- mission -->
    <section class="rts-mission">
        <div class="container">
            <div class="row justify-content-center rt-center">
                <div class="rts-section mb--50">
                    <h2 class="rts-section-title">Mission and Vision</h2>
                </div>
            </div>
            <!-- mission -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="rts-timeline-section">
                        <div class="rts-timeline-content">
                            <div class="left-side">
                                @foreach($missions as $mission)
                                    @if($loop->iteration % 2 != 0)
                                        <div class="single-timeline-item">
                                            <h5 class="timeline-title">{{$mission->title }}</h5>
                                            <p>{{ $mission->mission_text }}</p>
                                            <img src="{{ asset($mission->image) }}" alt="mission">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="separator">
                            </div>
                            <div class="right-side">
                                @foreach($missions as $mission)
                                    @if($loop->iteration % 2 == 0)
                                        <div class="single-timeline-item">
                                            <h5 class="timeline-title">{{$mission->title }}</h5>
                                            <p>{{ $mission->mission_text }}</p>
                                            <img src="{{ asset($mission->image) }}" alt="mission">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- mission end-->
    @endif

    @if(!empty($about))
    <section class="rts-campus-tour rts-section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title rt-center mb--50">Our Campus Tour</h2>
                <div class="col-12">
                    <div class="rts-video-section height-500 mb--50">
                        <a href="{{ $about->tour_link }}" class="rts-video-section-player popup-video video-btn">
                            <i class="fa-sharp fa-solid fa-play"></i>
                        </a>
                        <img src="{{ asset($about->tour_image) }}" alt="video-bg">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="rts-video-section-text rt-center mx-3">
                       {!! $about->tour_description !!}
                        <a href="{{ url('/gallery') }}" class="mt--15 about-btn rts-nbg-btn btn-arrow">Visit Campus <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($feedbacks))
    <!-- Testimonial Start -->
    <div class="rts-testimonial rts-section-padding">
        <div class="container">
            <!-- testimonial content -->
            <div class="row">
                <div class="col-12">
                    <div class="rts-testimonial-box">
                        <div class="testimonial-item rt-flex">
                            <div class="testimonial-item-image">
                                <img src="{{ asset('frontAssets/images/testimonial/testimonial-big.jpg') }}" alt="testimonial thumbnail">
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
                                        @foreach($feedbacks as $feedback)
                                        <!-- single testimonial -->
                                        <div class="swiper-slide">
                                            <div class="single-testimonial">
                                                <div class="rt-between mb--50">
                                                    <div class="rt-icon">
                                                        <img src="{{ asset($feedback->image) }}" alt="quote icon">
                                                    </div>
                                                </div>
                                                <p class="testimonial-text">
                                                    {{ $feedback->feedback }}
                                                </p>
                                                <div class="rt-testimonial-author mt--50">
                                                    <div class="rt-author-meta rt-flex rt-gap-20">
                                                        <div class="rt-author-img">
                                                            <img src="{{ asset($feedback->image) }}" alt="author">
                                                        </div>
                                                        <div class="rt-author-info">
                                                            <h5 class="mb-1">{{ $feedback->name }}</h5>
                                                            <p>{{ $feedback->title }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
    @endif
@endsection

