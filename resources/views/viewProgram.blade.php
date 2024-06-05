{{-- @extends('layouts.app')

@section('content')

<!-- BREADCRUMB AREA -->
<section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url({{ asset('assets/images/banner/breadcrumb.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $program->title }}</li>
                    </ul>
                    <h2 class="section-title">{{ $program->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BREADCRUMB AREA END -->


<!-- program content -->
<div class="rts-program rts-section-padding">
    <div class="container">
        <div class="rts-program-single-header">
            <div class="row align-items-center g-3">
                <div class="col-lg-6">
                    <h3 class="rts-section-title">{{ $program->title }}</h3>
                </div>
                <div class="col-lg-6">
                    <p class="rts-section-description">{{ $program->description }}</p>
                </div>
            </div>
        </div>
        <div class="rts-program-description">
            <div class="row sticky-coloum-wrap">
                <div class="col-lg-8">
                    <div class="program-description-area" id="curriculum">
                        <div class="program-big-thumb">
                            <img src="{{ asset('assets/images/course/program-big.jpg') }}" alt="program">
                        </div>
                        <div class="program-about">
                            <h4 class="title">About The Program</h4>
                            <p>{{ $program->about }}</p>
                        </div>
                        <div class="program-credit-area">
                            <h5 class="title">Program Courses: {{ $program->credits }} credits</h5>
                            <p>Core Required Courses for all majors:</p>
                            <div class="program-accordion">
                                <div class="accordion" id="rts-accordion">
                                    @foreach ($program->years as $year => $courses)
                                        <div class="accordion-item">
                                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $year }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $year }}">
                                                Year {{ $year }}
                                            </button>
                                            <div id="collapse{{ $year }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#rts-accordion">
                                                <div class="accordion-body-content">
                                                    <table class="table">
                                                        <thead class="table-theme">
                                                            <tr>
                                                                <th style="min-width: 80%;">Semester Courses</th>
                                                                <th>Credits</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($courses as $course)
                                                                <tr>
                                                                    <td>{{ $course->title }}</td>
                                                                    <td>{{ $course->credits }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- single testimonial -->
                        <div class="program-student-testimonial rt-relative">
                            <h5 class="title">Student Testimonials</h5>
                            <div class="single-testimonial-box">
                                <div class="single-testimonial-active">
                                    <div class="swiper-wrapper">
                                        @foreach ($feedback as $item)
                                            <!-- single slide -->
                                            <div class="swiper-slide">
                                                <div class="single-testimonial-item rt-relative">
                                                    <div class="rating-star mb--10">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <i class="fa-sharp fa-{{ $i < $item->rating ? 'solid' : 'light' }} fa-star"></i>
                                                        @endfor
                                                    </div>
                                                    <p class="rt-testimonial-text">{{ $item->feedback }}</p>
                                                    <div class="rt-testimonial-author mt--30">
                                                        <div class="rt-author-meta rt-flex rt-gap-20">
                                                            <div class="rt-author-img">
                                                                <img src="{{ asset('assets/images/testimonial/author-1.png') }}" alt="author">
                                                            </div>
                                                            <div class="rt-author-info">
                                                                <h5 class="mb-0">{{ $item->author_name }}</h5>
                                                                <p>{{ $item->author_title }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quote-icon">
                                                        <img src="{{ asset('assets/images/testimonial/quote.svg') }}" alt="quote">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single slide -->
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-4 sticky-coloum-item">
                    <div class="program-sidebar">
                        <!-- curriculum -->
                        <div class="program-curriculum">
                            <h6 class="heading-title">{{ $program->title }}</h6>
                            <div class="program-menu">
                                <ul class="list-unstyled">
                                    <li><a href="#curriculum"><span><i class="fa-light fa-arrow-right"></i></span>Course Curriculum</a></li>
                                    <li><a href="{{ url('admission') }}"><span><i class="fa-light fa-arrow-right"></i></span>Apply Admission</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- contact info -->
                        <div class="program-info">
                            <h5>Department Contact Info</h5>
                            <p>{{ $program->contact_info }}</p>
                            <div class="contact-info">
                                <h5>Contact:</h5>
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                <a href="callto:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            </div>
                            <div class="social-info">
                                <h5>Social Info:</h5>
                                <div class="social-info-link">
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- program content end -->

@endsection --}}


@extends('layouts.app')

@section('content')
<!-- BREADCRUMB AREA -->
<section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url({{ asset('assets/images/banner/breadcrumb.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $program->title }}</li>
                    </ul>
                    <h2 class="section-title">{{ $program->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BREADCRUMB AREA END -->

<!-- Program Content -->
<div class="rts-program rts-section-padding">
    <div class="container">
        <div class="rts-program-single-header">
            <div class="row align-items-center g-3">
                <div class="col-lg-6">
                    <h3 class="rts-section-title">{{ $program->title }}</h3>
                </div>
                <div class="col-lg-6">
                    <p class="rts-section-description">{{ $program->overview }}</p>
                </div>
            </div>
        </div>
        <div class="rts-program-description">
            <div class="row sticky-coloum-wrap">
                <div class="col-lg-8">
                    <div class="program-description-area" id="curriculum">
                        <div class="program-big-thumb">
                            <img src="{{ asset($program->program_image) }}" alt="program">
                        </div>
                        <div class="program-about">
                            <h4 class="title">About The Program</h4>
                            <p>{{ $program->overview }}</p>
                        </div>
                        <div class="program-curriculum">
                            <h4 class="title">Curriculum</h4>
                            {{-- @php
                                // Remove HTML tags and split the curriculum into individual weeks
                                $curriculumText = strip_tags($program->curriculum);
                                $weeks = explode("\n\n", trim($curriculumText));
                            @endphp

                            @if(count($weeks) > 0)
                                @foreach($weeks as $week)
                                    @php
                                        // Split each week into lines
                                        $lines = explode("\n", trim($week));
                                        $header = array_shift($lines);
                                    @endphp
                                    <div class="curriculum-week">
                                        <h5>{{ $header }}</h5>
                                        <ul>
                                            @foreach($lines as $line)
                                                <li>{!! nl2br(e($line)) !!}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                <p>No curriculum data available.</p>
                            @endif --}}
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4 sticky-coloum-item">
                    <div class="program-sidebar">
                        <!-- Additional sidebar content -->
                        <div class="program-info">
                            <h5>Department Contact Info</h5>
                            <p>{{ $program->department ?? 'Department Name' }}</p>
                            <div class="contact-info">
                                <h5>Contact:</h5>
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                <a href="callto:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            </div>
                            <div class="social-info">
                                <h5>Social Info:</h5>
                                <div class="social-info-link">
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Additional sidebar items can be added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
