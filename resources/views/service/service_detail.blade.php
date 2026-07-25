    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.$servicedetail->banner_image) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>{{ $servicedetail->service_name }}</h1>
                            </div>
                            <h1>{{ $servicedetail->service_name }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('service') }}">Services</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $servicedetail->service_name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-details pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 pr-25">
                        <div class="s-details-single mb-40">
                            <div class="s-details-thumb">
                                <img src="{{ asset('storage/'.$servicedetail->image) }}" alt="{{ $servicedetail->image_alt_tag }}">
                            </div>
                            <div class="s-details-text">
                                <h2>{{ $servicedetail->service_name }}</h2>
                                {!! $servicedetail->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="s-detls-right">
                            <div class="services-sidebar mb-40">
                                <div class="services-title">
                                    <h2>Other Services</h2>
                                </div>
                                <ul>
                                    @foreach($otherservice as $okey => $ovalue)
                                        <li>
                                            <div class="services-link">
                                                <img src="{{ asset('storage/'.$ovalue->icon) }}" alt="" style="height:40px">
                                                <a href="{{ route('service.service_detail', $ovalue->seo_url) }}">{{ $ovalue->service_name }}</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{-- <li>
                                        <div class="services-link">
                                            <img src="img/icon/sd02.png" alt="">
                                            <a href="#">Architeture</a>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="services-sidebar mb-40 d-none">
                                <div class="services-title">
                                    <h2>Download Brochure</h2>
                                </div>
                                <ul>
                                    <li>
                                        <div class="services-link">
                                            <img src="{{ asset('frontend/imgages/icon/sd07.png') }}" alt="">
                                            <a href="javascript:void(0);">Brochure. PDF</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection