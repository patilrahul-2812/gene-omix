    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_about_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>500</h1>
                            </div>
                            <h1>500</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">500</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="error404-wrap-section pt-50 pb-50">
            <div class="container text-center">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-8 col-md-10 col-sm-12 col-12">
                        <div class="error404_wrap-box">
                            <h1>500</h1>
                            <h2>Internal Server Error</h2>
                            <p class="pb-4">An unexpected error occurred. Please try again later.</p>
                            <div class="theme_btn">
                                <a href="{{ route('home') }}" class="theme-primary-btn btn-custom">Back To Home
                                    <span><img src="assets/images/icon/right-angle-arrow-whit-for-btn.png" alt=""></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection