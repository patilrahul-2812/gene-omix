    @extends('layouts.front_layout')
    @section('content')
        <!-- page title area start -->
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_blog_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>Blog</h1>
                            </div>
                            <h1>Blog</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-area gray-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($blog as $beky => $bvalue)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-blog mb-30">
                                <div class="blog-thumb">
                                    @if($bvalue->image)
                                        <img src="{{ asset('storage/'.$bvalue->image) }}" alt="{{ $bvalue->alt_tag }}">
                                    @else 
                                        <img src="{{ asset('default_images/no-image-370-260.jpg') }}">
                                    @endif
                                </div>
                                <div class="b-content">
                                    <div class="b-meta mb-10">
                                        <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($bvalue->created_at)->format('d M Y') }}</span>
                                    </div>
                                    <div class="b-text mb-15">
                                        <h3><a href="{{ route('blog.blogdetail', $bvalue->seo_url) }}">{{ $bvalue->title }}</a></h3>
                                    </div>
                                    <div class="b-btn">
                                        <a href="{{ route('blog.blogdetail', $bvalue->seo_url) }}">Read More <i class="ti-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-blog mb-30">
                            <div class="blog-thumb">
                                <img src="img/blog/blog02.jpg" alt="image_not_found">
                            </div>
                            <div class="b-content">
                                <div class="b-meta mb-10">
                                    <span><a href="#"><i class="fas fa-user"></i> Admin</a></span>
                                    <span><a href="#"><i class="far fa-calendar-alt"></i> 16 December 2021</a></span>
                                </div>
                                <div class="b-text mb-15">
                                    <h3><a href="blog-details.php">Rorem ipsum dolor sit amet oreety dolore magnam</a></h3>
                                </div>
                                <div class="b-btn">
                                    <a href="blog-details.php">Read More <i class="ti-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    @endsection