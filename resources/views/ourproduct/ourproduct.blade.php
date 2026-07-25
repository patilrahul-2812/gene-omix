    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_our_product_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>Our Products</h1>
                            </div>
                            <h1>Our Products</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Products</li>
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
                    @foreach($ourproduct as $okey => $ovalue)
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
    @endsection