    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_services_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>Services</h1>
                            </div>
                            <h1>Services</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-area gray-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($service as $key => $svalue)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="services-box text-center mb-30">
                                <div class="services-box-thumb mb-25">
                                    <img src="{{ asset('storage/'.$svalue->icon) }}" alt="">
                                </div>
                                <div class="services-box-text">
                                    <h2>{{ $svalue->service_name }}</h2>
                                    <a class="sevices-btn" href="{{ route('service.service_detail', $svalue->seo_url) }}">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="services-box active text-center mb-30">
                            <div class="services-box-thumb mb-25">
                                <img src="images/services/mrna-synthesis.png" alt="image_not_found">
                            </div>
                            <div class="services-box-text">
                                <h2>Gene Synthesis</h2>
                                <a class="sevices-btn" href="biofoundary-services.php">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
    @endsection