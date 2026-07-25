    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.$blogdetail->banner_image) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>{{ $blogdetail->title }}</h1>
                            </div>
                            <h1>{{ $blogdetail->title }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('blog') }}">Blog</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $blogdetail->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-content-area pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="blog-wrapper">
                            <article>
                                <div class="post-item mb-40">
                                    <div class="post-inner">
                                        <div class="post-thumb">
                                            @if($blogdetail->image)
                                                <img src="{{ asset('storage/'.$blogdetail->image) }}" alt="{{ $blogdetail->alt_tag }}">
                                            @else 
                                                <img src="{{ asset('default_images/no-image-370-260.jpg') }}">
                                            @endif
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta pt-35 mb-20">
                                                <span><i class="far fa-calendar-check"></i> {{ \Carbon\Carbon::parse($blogdetail->created_at)->format('M d Y') }}</span>
                                            </div>
                                            <h4 class="post-title">{{ $blogdetail->title }}</h4>
                                            <div class="post-text">
                                                {!! $blogdetail->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection