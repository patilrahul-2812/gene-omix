    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_our_team_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>Our Team</h1>
                            </div>
                            <h1>Our Team</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Team</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            <!-- team start -->
            <section class="team-area pt-50 pb-40 gray-bg">
                <div class="container">
                    @foreach($department as $dkey => $dvalue)
                        <div class="section-title text-center">
                            <h2><span>{{ $dvalue->department_name }}</span></h2>
                        </div>
                        <div class="row justify-content-center">
                            @foreach($dvalue->ourteam as $okey => $ovalue)
                                <div class="col-xl-3 col-lg-3 col-md-6 d-flex">
                                    <div class="single-team text-center mb-30 w-100">
                                        <div class="team-thumb">
                                            @if($ovalue['profile_image'])
                                                <img src="{{ asset('storage/'.$ovalue['profile_image']) }}" class="img-fluid" alt="">
                                            @else
                                                <img src="{{ asset('default_images/user.jpg') }}" class="img-fluid" alt="">
                                            @endif
                                            <div class="team-icon">
                                                <a href="{{ $ovalue['facebook'] ? $ovalue['facebook'] : 'javascript:void(0)' }}" {{ $ovalue['facebook'] ? "target='_blank'" : ''}}><i class="fab fa-facebook-f"></i></a>
                                                <a href="{{ $ovalue['linkedin'] ? $ovalue['linkedin'] : 'javascript:void(0)' }}" {{ $ovalue['linkedin'] ? 'target="_blank"' : ''}}><i class="fab fa-linkedin"></i></a>
                                                <a href="{{ $ovalue['email'] ? $ovalue['email'] : 'javascript:void(0)' }}" {{ $ovalue['email'] ? 'target="_blank"' : ''}}><i class="fab fa-google-plus-g"></i></a>
                                                <a href="{{ $ovalue['instagram'] ? $ovalue['instagram'] : 'javascript:void(0)' }}" {{ $ovalue['instagram'] ? 'target="_blank"' : ''}}><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="team-content text-center d-flex flex-column align-items-center">
                                            <h3>{{ $ovalue['name'] }}</h3>
                                            <h5 class="h5-title text-center">{{ $ovalue['designation']['designation_name'] }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="single-team text-center mb-30">
                                    <div class="team-thumb">
                                        <img src="img/team/team-02.jpg" alt="image_not_found">
                                        <div class="team-icon">
                                            <a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>
                                            <a href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                                            <a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a>
                                            <a href="javascript:void(0);"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-content text-center">
                                        <h3>Janimiya</h3>
                                        <h5>Sales</h5>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    @endforeach
                </div>
            </section>
    @endsection