@extends('layouts.app')

@section('content')

<!-- BREADCRUMB AREA -->
<section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url({{ !empty($pageGlobalData->setting)? asset($pageGlobalData->setting->banner) : null}})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

    {{-- <div class="rts-campus-contact pb--120">
        <div class="container">
            <div class="contact-map mt--30">
                <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14602.288851207937!2d90.47855065!3d23.798243149999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1663151706353!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- other contact method end --> --}}


@endsection