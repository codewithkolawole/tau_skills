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
                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                    </ul>
                    <h2 class="section-title">Courses</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BREADCRUMB AREA END -->

<!-- faculty directory -->
<section class="rts-faculty rts-section-padding">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-11 d-flex flex-wrap gap-5 justify-content-between align-items-start mb--60 border-bottom pb-5">
                <div class="rts-section">
                    <h3 class="rts-section-title">Our Courses</h3>
                </div>
            </div>
        </div>
        @if (!empty($courses))
        <div class="row g-5">
            @foreach ($courses as $course)
            <!-- single item -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-cat-item">
                    <div class="cat-thumb">
                        <img src="{{ asset($course->program_image) }}" alt="course-thumbnail">
                    </div>
                    <div class="cat-meta">
                        <div class="cat-title">
                            <a href="{{ url('/courseDetails/'.$course->slug) }}">{{ $course->title }}</a>
                        </div>
                        <div class="cat-link">
                            <a href="{{ url('/courseDetails/'.$course->slug) }}" class="cat-link-arrow"><i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- single item -->
            @endforeach
        </div>
        @endif
    </div>
</section>
<!-- faculty directory end -->
@endsection