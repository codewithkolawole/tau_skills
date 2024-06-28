@extends('layouts.app')

@section('content')


 <!-- BREADCRUMB AREA -->
 <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url('{{ !empty($gallery->image) ? asset($gallery->image): '' }}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ul>
                        <h2 class="section-title">University Gallery</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <!-- university event list -->
    <div class="rts-event rts-section-padding">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-md-start g-5">
                <!-- single event item -->
                @foreach($gallery as $item)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="single-event">
                            <div class="event single-event__content">
                                <div class="event__thumb">
                                    <img src="{{ asset($item->image) }}" alt="event thumbnail" >
                                </div>
                                <div class="event__meta">
                                    <h5 class="event__title">{{ ($item->title) }}</h5>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!-- single event item end -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- university event list end -->
@endsection