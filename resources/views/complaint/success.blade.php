    @extends('layouts.front_layout')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-7 col-xxl-5">
                    <div class="py-5 px-5 bg-white shadow">
                        <!-- <div class="logo mb-3"><img src="images/gic-logo-new-2.png" class="img-fluid m-auto d-block" alt=""></div>
                        <hr> -->
                        <!-- <h3 class="p-2 text-center mb-4 sub-heading">GIC Re</h3> -->

                        <!-- <h5 class="text-center mb-4 login-title">Login for Registered Users</h5> -->
                        <div class="row justify-content-center text-center">
                            <div class="col-md-12">
                                <h2 class="text-success mb-3">Complaint Registered Successfully</h2>
                                <div class="success-img-wrap text-center my-4">
                                    <img src="{{ asset('frontend/images/check.png') }}" alt="">
                                </div>
                                <div class="success-content text-center">
                                    <h4>Thank You!</h4>
                                    <h6 class="text-black-50">You can track the status of your complaint by login</h6>
                                    <a href="{{ route('home') }}" class="btn custom-btn mt-2">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection