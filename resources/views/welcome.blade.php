@extends('Website.layouts.master')

@section('content')

<!-- Main Slider Three -->
<section class="main-slider-three">
    <div class="banner-carousel">
        <!-- Swiper -->
        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>Your Most Trusted Health Partner For Life.</h2>
                                <div class="text">We offer free consulting and the best project management for your ideas, 100% delivery guaranteed.</div>
                                <div class="btn-box">
                                    <a href="#about" class="theme-btn appointment-btn"><span class="txt">Appointment</span></a>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ asset('Website/images/doctor.jpg') }}" alt="" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="swiper-slide slide">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>Your Most Trusted Health Partner For Life.</h2>
                                <div class="text">We offer free consulting and the best project management for your ideas, 100% delivery guaranteed.</div>
                                <div class="btn-box">
                                    <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">Appointment</span></a>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ asset('Website/images/doctor.jpg') }}" alt="" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="swiper-slide slide">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>Your Most Trusted Health Partner For Life.</h2>
                                <div class="text">We offer free consulting and the best project management for your ideas, 100% delivery guaranteed.</div>
                                <div class="btn-box">
                                    <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">Appointment</span></a>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ asset('Website/images/doctor.jpg') }}" alt="" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!-- End Main Slider -->

<!-- Health Section -->
<section id="ab" class="health-section">
    <div class="auto-container">
        <div class="inner-container">

            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="border-line"></div>
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>Who We Are <br> Pioneering in Health.</h2>
                            <div class="separator"></div>
                        </div>
                        <div class="text">Where you are at the heart of our mission. We hope you will consider us as your medical home—the place where you feel safe, comfortable and cared for. As a multi-specialty medical group,</div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ asset('Website/images/1.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- End Health Section -->

<!-- Featured Section -->
<section class="featured-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="upper-box">
                        <div class="icon flaticon-doctor-stethoscope"></div>
                        <h3><a >Medical Treatment</a></h3>
                    </div>
                    <div class="text">Whether you're taking your first steps, just finding your stride,</div>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                    <div class="upper-box">
                        <div class="icon flaticon-ambulance-side-view"></div>
                        <h3><a>Emergency Help</a></h3>
                    </div>
                    <div class="text">Whether you're taking your first steps, just finding your stride,</div>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="upper-box">
                        <div class="icon fas fa-user-md"></div>
                        <h3><a >Qualified Doctors</a></h3>
                    </div>
                    <div class="text">Whether you're taking your first steps, just finding your stride,</div>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
                    <div class="upper-box">
                        <div class="icon fas fa-briefcase-medical"></div>
                        <h3><a >Medical Professionals</a></h3>
                    </div>
                    <div class="text">Whether you're taking your first steps, just finding your stride,</div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Featured Section -->

<!-- Department Section Three -->
<section class="department-section-three">
    <div class="image-layer" style="background-image:url(images/background/6.jpg)"></div>
    <div class="auto-container">
        <!-- Department Tabs-->
        <div class="department-tabs tabs-box">
            <div class="row clearfix">
                <!--Column-->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <!-- Sec Title -->
                    <div class="sec-title light">
                        <h2>Health <br> Department</h2>
                        <div class="separator"></div>
                    </div>
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                        @php
                            $sections = App\Models\Section::all();
                        @endphp
                        @foreach($sections as $key => $section)
                            <li data-tab="#tab-{{ $key }}" class="tab-btn {{ $loop->first ? 'active-btn' : '' }}">
                                {{ $section->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--Column-->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <!--Tabs Container-->
                    <div class="tabs-content">
                        @foreach($sections as $key => $section)
                            <!-- Tab -->
                            <div class="tab {{ $loop->first ? 'active-tab' : '' }}" id="tab-{{ $key }}">
                                <div class="content">
                                    <h2>{{ $section->name }}</h2>
                                    <div class="title">{{ $section->name }}</div>
                                    <div class="text">
                                        <p>{{ $section->description }}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>01 - {{ $section->name }} Service</h3>
                                            <div class="column-text">
                                                {{ $section->description }}
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>02 - {{ $section->name }} Service</h3>
                                            <div class="column-text">
                                                {{ $section->description }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Department Section -->

<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>The Medical Specialists</h2>
            <div class="separator"></div>
        </div>

        <div class="row clearfix">
            @php
                // Fetch all doctors
                $doctors = App\Models\Doctor::all();
            @endphp

            @foreach($doctors as $doctor)
                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="{{ $loop->iteration * 250 }}ms" data-wow-duration="1500ms">
                        <div class="image">
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="{{ $doctor->facebook_link ?? '#' }}"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="{{ $doctor->google_link ?? '#' }}"><span class="fab fa-google"></span></a></li>
                                    <li><a href="{{ $doctor->twitter_link ?? '#' }}"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="{{ $doctor->skype_link ?? '#' }}"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="{{ $doctor->linkedin_link ?? '#' }}"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">Make Appointment</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{ $doctor->name }}</a></h3>
                            <div class="designation">{{ $doctor->section->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

<!-- End Team Section -->

<!-- Video Section -->
<section class="video-section" style="background-image:url(images/background/5.jpg)">
    <div class="auto-container">
        <div class="content">
            <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image play-box"><span class="flaticon-play-button"><i class="ripple"></i></span></a>
            <div class="text">WE ARE CARE ABOUT YOUR HEALTH</div>
            <h2>We Care About You</h2>
        </div>
    </div>
</section>
<!-- End Video Section -->

<!-- Appointment Section Two -->
<section id="about" class="appointment-section-two mb-4">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ asset('Website/images/c.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>Appointment Form</h2>
                            <div class="separator"></div>
                        </div>

                        <!-- Appointment Form -->
                        <div class="appointment-form">

                            <livewire:appointments.create/>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section Two -->

<!-- End Testimonial Section Two -->

<!-- Counter Section -->

<!-- End Counter Section -->

<!-- Doctor Info Section -->


@endsection
