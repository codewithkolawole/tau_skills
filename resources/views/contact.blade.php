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
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ul>
                        <h2 class="section-title">Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- rts contact info -->
    <section class="rts-contact-info rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts-section rt-center mb--40">
                    <h2 class="rts__section--title text-capitalize">General Contact Information</h2>
                </div>
            </div>
            <div class="contact-information">
                <div class="row justify-content-md-start  justify-content-sm-center g-5">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-contact">
                            <div class="single-contact__single">
                                <div class="icon">
                                    <i class="fa-thin fa-map-location-dot"></i>
                                </div>
                                <p class="--p-m">{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->address : null }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-contact">
                            <div class="single-contact__single">
                                <div class="icon" >
                                    <i class="fa-thin fa-phone"></i>
                                </div>
                                <div class="method">
                                    {{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->phone_number : null }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- rts contact info end -->

    <div class="rts-campus-contact pb--120">
        <div class="container">
            <div class="contact-map mt--30">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.3879751756174!2d5.015849214762329!3d8.133872193401687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104c94792c0f6535%3A0x7e2bfb0e9db21e93!2sThomas%20Adewumi%20University!5e0!3m2!1sen!2sng!4v1699024973764!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- other contact method end -->


@endsection