@extends('layouts.app')

@section('content')
<!-- BREADCRUMB AREA -->
<section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url({{ !empty($pageGlobalData->setting)? asset($pageGlobalData->setting->banner) : null}});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $course->title }}</li>
                    </ul>
                    <h2 class="section-title">{{ $course->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BREADCRUMB AREA END -->

<div class="rts-program rts-section-padding">
    <div class="container">
        <div class="rts-program-single-header">
            <div class="row align-items-center g-3">
                <div class="col-lg-6">
                    <h3 class="rts-section-title"> Overview of {{ $course->title }} - ({{ $course->programcode }})</h3>
                </div>
                <div class="col-lg-6">
                    <p class="rts-section-description">{!! $course->overview !!}</p>
                </div>
            </div>
        </div>
        <div class="rts-program-description">
            <div class="row sticky-coloum-wrap">
                <div class="col-lg-8">
                    <div class="program-description-area" id="curriculum">
                        <div class="program-big-thumb">
                            <img src="{{ asset($course->program_image) }}" alt="program">
                        </div>
                        <div class="program-about">
                            <h4 class="title">About The Course</h4>
                            {!! $course->curriculum !!}
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-4 sticky-coloum-item">
                    <div class="program-sidebar">
                        <!-- join event -->
                        <div class="program-event">
                            <div class="program-event-content">
                                <a href="#" class="rts-theme-btn btn-arrow btn-white">Apply Now<span><i class="fa-thin fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- program content end -->
@endsection
