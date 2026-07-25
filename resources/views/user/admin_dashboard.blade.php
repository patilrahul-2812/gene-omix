    @extends('layouts.admin_default')
    @section('content')
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/dashboard-ecommerce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/charts/chart-apex.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">

        <div class="content-wrapper p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Total Counts</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 me-25 mb-0"></p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <!-- <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">230k</h4>
                                                    <p class="card-text font-small-3 mb-0">Sales</p>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <a href="{{ route('ourproductinquiry.index') }}">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-info me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="bell"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">{{ $product_inquiry }}</h4>
                                                        <p class="card-text font-small-3 mb-0">Total Product Inquiry</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <a href="{{ route('inquiry.index') }}">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-info me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="bell"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">{{ $inquiry }}</h4>
                                                        <p class="card-text font-small-3 mb-0">Total Inquiry From Contact Page</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <script src="{{ asset('admin/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
        <!-- END: Page JS-->
    @endsection