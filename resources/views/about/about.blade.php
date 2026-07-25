    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_about_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>About Us</h1>
                            </div>
                            <h1>About Us</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-area pt-120 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-left pos-rel">
                            <div class="border-title-2">
                                <h1>About Us</h1>
                            </div>
                            <div class="about-title mb-20">
                                <h5>About us</h5>
                                <h2>{{ $about->title }}</h2>
                            </div>
                            {!! $about->about_desc !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right pos-rel">
                            <div class="about-right-content">
                                <h1>{{ $about->years_of_experience }}<span>+</span></h1>
                                <h5>Years</h5>
                                <h3>of Experience</h3>
                            </div>
                            <div class="about-right-thumb">
                                <img src="{{ asset('storage/'.$about->experience_img) }}" alt="image_not_found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="services-area gray-bg pt-70 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6col-lg-6 col-md-6">
                        <div class="services-box text-center mb-30">
                            <div class="services-box-thumb mb-25">
                                <img src="{{ asset('frontend/images/about/vision.png') }}" alt="vision">
                            </div>
                            <div class="vision-mission-box-text">
                                <h2>Vision</h2>
                                <h5>{{ $about->vision }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="services-box text-center mb-30">
                            <div class="services-box-thumb mb-25">
                                <img src="{{ asset('frontend/images/about/mission.png') }}" alt="mission">
                            </div>
                            <div class="vision-mission-box-text">
                                <h2>Mission</h2>
                                <h5>{{ $about->mission }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="about-area pt-50 pb-10 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="pb-20">Distributed Network</h2>
                        <img src="{{ asset('storage/'.$about->distribution_network_img) }}" alt="" width="100%">
                    </div>
                </div>
            </div>
        </section>

        @php
            $ourclient = json_decode($about->our_clients, true);
        @endphp
        @if(!empty($ourclient))
            <section class="brand-area gray-bg pt-40 pb-40">
                <h2 class="text-center">Our Collaborators</h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="brand-active owl-carousel">
                                @foreach($ourclient as $key => $ovalue)
                                    <div class="single-brand">
                                        <a class="partner-logo" href="javascript:void(0);">
                                            <img class="before-image" src="{{ asset('storage/'.$ovalue['image']) }}" alt="image_not_found">
                                            <img class="after-image" src="{{ asset('storage/'.$ovalue['image']) }}" alt="image_not_found">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endsection