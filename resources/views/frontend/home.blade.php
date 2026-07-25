    @extends('layouts.front_layout')
    @section('content')
        <!-- slider start -->
        <section class="slider-area">
            <div class="slider-active">
                @foreach($slider as $key => $value)
                    <div class="single-slider slider-height pos-rel d-flex align-items-center" data-background="{{ asset('storage/'.$value->image) }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="slider-content">
                                        <h5 data-animation="fadeInUp" data-delay=".2s" style="color:{{ $value->title1_color }}">{{ $value->title1 }}</h5>
                                        <h1 data-animation="fadeInUp" data-delay=".4s" style="color:{{ $value->title2_color }}">{{ $value->title2 }}</h1>
                                        <div class="slider-btn">
                                            <a data-animation="fadeInLeft" data-delay=".6s" class="thm-btn" href="{{ route('contact') }}">Contact us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- <div class="single-slider slider-height pos-rel d-flex align-items-center" data-background="images/slider/slider-02.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="slider-content">
                                    <h5 data-animation="fadeInUp" data-delay=".2s">General Contracting</h5>
                                    <h1 data-animation="fadeInUp" data-delay=".4s">Build everything you needs<span>.</span></h1>
                                    <p data-animation="fadeInUp" data-delay=".6s">Rorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inciidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <div class="slider-btn">
                                        <a data-animation="fadeInLeft" data-delay=".6s" class="thm-btn" href="javascript:void(0);">Contact us</a>
                                        <a data-animation="fadeInRight" data-delay=".6s" class="thm-btn border-btn" href="javascript:void(0);">Free Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!-- slider end --> 

        <!-- about start -->
        <section class="about-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-tab">
                            <div class="about-wrapper pt-120">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="about-left pos-rel">
                                            <div class="border-title-2">
                                                <h1>About</h1>
                                            </div>
                                            <div class="about-title mb-20">
                                                <h5>About us !</h5>
                                                <h2>{{ $about->title }}</h2>
                                            </div>
                                            <p>{!! substr($about->about_desc, 0, 300) !!}...</p>
                                            <div class="about-btn pt-20">
                                                <a href="{{ route('about') }}" class="thm-btn">Read More <i class="ti-arrow-right"></i></a>
                                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about end -->

        <!-- services start -->
         @if(!$service->isEmpty())
            <section class="services-area gray-bg pt-120 pb-90">
                <div class="container">
                    <div class="section-title text-center">
                        <div class="border-title">
                            <h1>Services</h1>
                        </div>
                        <h5>Our Services</h5>
                        <h2>we are expert in</h2>
                    </div>
                    <div class="row justify-content-center">
                        @foreach($service as $key => $value)
                            <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                                <div class="services-box text-center mb-30 d-flex flex-column w-100">
                                    <div class="services-box-thumb mb-25">
                                        <img src="{{ asset('storage/'.$value->icon) }}" alt="image not found">
                                    </div>
                                    <div class="services-box-text mt-auto">
                                        <h2>{{ $value->service_name }}</h2>
                                        <a class="sevices-btn" href="{{ route('service.service_detail', $value->seo_url) }}">Read More <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                            <div class="services-box text-center mb-30 d-flex flex-column w-100">
                                <div class="services-box-thumb mb-25">
                                    <img src="images/services/mrna-synthesis.png" alt="image_not_found">
                                </div>
                                <div class="services-box-text mt-auto">
                                    <h2>Gene Synthesis</h2>
                                    <a class="sevices-btn" href="javascript:void(0);">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
        @endif
        <!-- services end -->

        <!-- testimonial start -->
        <section class="testimonial-area">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-xl-6">
                        <div class="counter-left counter-height pt-125 pb-125" data-background="{{ asset('frontend/images/home/testimonial-bg.png') }}">
                            <div class="counter-content">
                                <ul>
                                    <li>
                                        <div class="counter-box">
                                            <h1><span>{{ getSettingData('config_awards_winning') }}</span>+</h1>
                                            <div class="counter-right-text">
                                                <p>Awards</p>
                                                <p><span>winnig</span></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter-box">
                                            <h1><span>{{ getSettingData('config_happy_clients') }}</span>+</h1>
                                            <div class="counter-right-text">
                                                <p>Happy</p>
                                                <p><span>Clients</span></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter-box">
                                            <h1><span>{{ getSettingData('config_engineer_members') }}</span>+</h1>
                                            <div class="counter-right-text">
                                                <p>engineer</p>
                                                <p><span>members</span></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="testimonial-right testimonial-height" data-background="{{ asset('frontend/images/home/home-testimonial-desc-bg.jpg') }}">
                            <div class="testimonial-active owl-carousel">
                                @if(!$testimonial->isEmpty())
                                    @foreach($testimonial as $tkey => $value)
                                        <div class="testimonial-single text-center">
                                            <div class="testimonial-thumb">
                                                @if($value->profile_image)
                                                    <img src="{{ asset('storage/'.$value->profile_image) }}" alt="image not found">
                                                @else
                                                    <img src="{{ asset('frontend/images/no-images/user.png') }}" alt="image not found">
                                                @endif
                                            </div>
                                            <div class="testimonial-text">
                                                <h3>{{ $value->client_name }}</h3>
                                                <span>{{ $value->designation }}</span>
                                                <p>{{ $value->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <!-- <div class="testimonial-single text-center">
                                    <div class="testimonial-thumb">
                                        <img src="img/testimonial/testi-01.jpg" alt="image_not_found">
                                    </div>
                                    <div class="testimonial-text">
                                        <h3>rasalina De Willam</h3>
                                        <span>founder & Co</span>
                                        <p>Reorem ipsum dolor sit amet, c onsectetur adipisicing elit, sed do eiusmod tempor in cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum ulpa qui officia desdy.</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial end -->

        <!-- blog start -->
        <section class="blog-area gray-bg pt-120 pb-90">
            <div class="container">
                <div class="row mb-45">
                    <div class="col-xl-6 col-lg-6 col-md-8">
                        <div class="blog-title">
                            <div class="border-title-2">
                                <h1>Blogs</h1>
                            </div>
                            <div class="about-title">
                                <h5>Latest Blogs</h5>
                                <h2>Our Latest Blogs<span>.</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-4">
                        <div class="blog-top-btn text-right">
                            <a href="{{ route('blog') }}" class="thm-btn black-btn">More Blogs</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($blog as $bkey => $bvalue)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="blog-item mb-30">
                                <div class="blog-image">
                                    @if($bvalue->image)
                                        <img src="{{ asset('storage/'.$bvalue->image) }}" alt="image_not_found">
                                    @else
                                        <img src="{{ asset('default_images/no-image-370-470.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="blog-content">
                                    <div class="blog-tag mb-125">
                                        <span>{{ \Carbon\Carbon::parse($bvalue->created_at)->format('jS M Y') }}</span>
                                    </div>
                                    <div class="blog-text mb-65">
                                        <h2><a href="{{ route('blog.blogdetail', $bvalue->seo_url) }}">{{ $bvalue->title }}</a></h2>
                                        <p>{!! Str::words($bvalue->description, 30, ' ...') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="blog-item mb-30">
                            <div class="blog-image blog-image-2">
                                <img src="img/blog/blog-bg-01.jpg" alt="image_not_found">
                            </div>
                            <div class="blog-content">
                                <div class="blog-tag blog-tag-2 mb-125">
                                    <span>24th.jan</span>
                                </div>
                                <div class="blog-text mb-65">
                                    <h2><a href="blog-details.php">Highquality construction Services for you</a></h2>
                                    <p>Reolu ptatem consectetur adipatem sequi nesciunt. Neque voluptatem.Reolu ptatem consectetur adipatem sequi nesciunt. </p>
                                </div>
                                <div class="blog-author">
                                    <div class="blog-author-thumb">
                                        <img src="img/blog/blog-author.png" alt="image_not_found">
                                    </div>
                                    <h4>Rasalina De wiiamson</h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- blog end -->
    @endsection