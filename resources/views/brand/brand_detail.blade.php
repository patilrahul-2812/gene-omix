    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.$branddetail->banner_image) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>{{ $branddetail->brand_name }}</h1>
                            </div>
                            <h1>{{ $branddetail->brand_name }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('brand') }}">Brand</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $branddetail->brand_name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-details pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 pr-25 d-flex flex-column">
                        <div class="text-right mt-auto mb-4">
                            @if($branddetail->brochure)
                                <a href="{{ asset('storage/'.$branddetail->brochure) }}" target="_blank" class="btn-class"><img src="{{ asset('frontend/images/icon/sd07.png') }}" alt=""> Download Brochure</a>
                            @endif
                        </div>
                        <div class="s-details-single mb-40">
                            <div class="s-details-thumb">
                                <img src="{{ asset('storage/'.$branddetail->image) }}" alt="{{ $branddetail->image_alt_tag }}" class="img-fluid">
                            </div>
                            <div class="s-details-text">
                                <h2>{{ $branddetail->brand_name }}</h2>
                                {!! $branddetail->brand_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(optional($branddetail->ourproduct)->isNotEmpty())
            <section class="feature-area process-area brand-products gray-bg pt-50 pb-60">
                <div class="container">
                    <div class="section-title text-center">
                        <h2>Products</h2>
                    </div>
                    <div class="row justify-content-center">
                        @foreach($branddetail->ourproduct as $okey => $ovalue)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="feature-single mb-30">
                                    <div class="feature-thumb">
                                        @if($ovalue->image)
                                            <img src="{{ asset('storage/'.$ovalue->image) }}" alt="{{ $ovalue->alt_tag }}">
                                        @else
                                            <img src="{{ asset('default_images/no-image-370-260.jpg') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="feature-text">
                                        <h2><a href="{{ route('ourproduct.ourproduct_detail', $ovalue->seo_url) }}">{{ $ovalue->product_name }}</a></h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="feature-single mb-30">
                                <div class="feature-thumb">
                                    <img src="img/project/p02.jpg" alt="image_not_found">
                                </div>
                                <div class="feature-text">
                                    <h2><a href="multiplex-array-system.php">Multiplex Array system</a></h2>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section>
        @endif
    @endsection
