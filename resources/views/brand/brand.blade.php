    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_brand_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>Brand</h1>
                            </div>
                            <h1>Brand</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Brand</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-area process-area gray-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($brand as $key => $bvalue)
                        <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-stretch mb-30">
                            <div class="feature-single d-flex flex-column justify-content-between flex-fill">
                                <div class="feature-thumb">
                                    <img src="{{ asset('storage/'.$bvalue->brand_logo) }}" alt="{{ $bvalue->brand_logo_alt_tag }}">
                                </div>
                                <div class="feature-text">
                                    <h2><a href="{{ route('brand.brand_details', $bvalue->seo_url) }}">{{ $bvalue->brand_name }}</a></h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="feature-single mb-30">
                            <div class="feature-thumb">
                                <img src="images/brand/icluebio-logo.jpg" alt="image_not_found">
                            </div>
                            <div class="feature-text">
                                <h2><a href="icluebio.php">iClueBio</a></h2>
                            </div>
                        </div>
                    </div> -->                    
                </div>
            </div>
        </section>
    @endsection