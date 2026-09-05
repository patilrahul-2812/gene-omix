    @extends('layouts.front_layout')
    @section('content')
        <!-- page title area start -->
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.$ourproductdetail->banner_image) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>{{ $ourproductdetail->product_name }}</h1>
                            </div>
                            <h1>{{ $ourproductdetail->product_name }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('ourproduct') }}">Our Products</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $ourproductdetail->product_name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-details pt-50 pb-80">
            <div class="container">
                <div class="flash_messages">
                    @include('flash_messages.frontend_message')
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 pt-25 d-flex flex-column">
                        <div class="text-right mt-auto mb-4">
                            <div class="jsBrochureButton">
                                @if($ourproductdetail->brochure)
                                    <a href="javascript:void(0);" class="btn-class" data-toggle="modal" data-target="#exampleModal"><img src="{{ asset('frontend/images/icon/sd07.png') }}" alt=""> Download Brochure</a>
                                @endif
                            </div>
                            {{-- <a href="@if($ourproductdetail->brochure) {{ asset('storage/'.$ourproductdetail->brochure) }}  @else javascript:void(0); @endif" @if($ourproductdetail->brochure) target="_blank" @endif class="btn-class"><img src="{{ asset('frontend/images/icon/sd07.png') }}" alt=""> Download Brochure</a> --}}
                        </div>
                        <div class="s-details-single mb-40">
                            <div class="s-details-thumb">
                                @if($ourproductdetail->image && Storage::disk('public')->exists($ourproductdetail->image))
                                    <img src="{{ asset('storage/'.$ourproductdetail->image) }}" class="img-fluid" alt="{{ $ourproductdetail->alt_tag }}">
                                @endif
                            </div>
                            <div class="s-details-text">
                                <h2>{{ $ourproductdetail->product_name }}</h2>
                                {!! $ourproductdetail->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please Fill Form to Get Brochure</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('submit_product_inquiry') }}" method="post" class="jsFormValidate">
                            @csrf()
                            <input type="hidden" name="ourproduct_id" value="{{ $ourproductdetail->id }}">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="mobile-no" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile_no" class="form-control only_numbers">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="company-name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="designation-name" class="form-label">Designation Name <span class="text-danger">*</span></label>
                                    <input type="text" name="designation_name" class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn-class">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <script typ="text/javascript">
            $('.only_numbers').keyup(function(e)
            {
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
            
            $.validator.addMethod("validEmail", function(value, element) {
                if (value == '') return true;
                var temp1;
                temp1 = true;
                var ind = value.indexOf('@');
                var str2 = value.substr(ind + 1);
                var str3 = str2.substr(0, str2.indexOf('.'));
                if (str3.lastIndexOf('-') == (str3.length - 1) || (str3.indexOf('-') != str3.lastIndexOf('-'))) return false;
                var str1 = value.substr(0, ind);
                if ((str1.lastIndexOf('_') == (str1.length - 1)) || (str1.lastIndexOf('.') == (str1.length - 1)) || (str1.lastIndexOf('-') == (str1.length - 1))) return false;
                str = /(^[a-zA-Z0-9]+[\.\.\._-]{0,1})+([a-zA-Z0-9]+[\.\.\._-]{0,1})*@([a-zA-Z0-9]+[-]{0,1})+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,3})$/;
                temp1 = str.test(value);
                return temp1;
            }, "Please Enter Valid Email Address");
            
            $('.jsFormValidate').validate({
                ignore: "",
                rules:{
                    'first_name': {
                        required: true,
                    },
                    'last_name': {
                        required: true,
                    },
                    'email': {
                        required: true,
                        email:true,
                        validEmail:true,
                    },
                    'mobile_no': {
                        required : true,
                        digits: true,
                        minlength:10,
                        maxlength:10,
                    },
                    'company_name': {
                        required: true,
                    },
                    'designation_name': {
                        required: true,
                    },
                    'message': {
                        required: true,
                    },
                    "hiddenRecaptcha": {
                        required: function () {
                            if (grecaptcha.getResponse() == '') {
                                    return true;
                            } else {
                                    return false;
                            }
                        }
                    }
                },
                messages:{
                    'first_name': {
                        required: 'Please Enter Your First Name'
                    },
                    'last_name': {
                        required: 'Please Enter Your Last Name'
                    },
                    'email':{
                        required: "Please Enter Email",
                        email:"Please Enter Valid Email Address",
                    },
                    'mobile_no': {
                        required: "Please Enter Mobile Number",
                        minlength:jQuery.validator.format("Please Enter {0} Digit Mobile Number"),
                        maxlength:jQuery.validator.format("Please Enter {0} Digit Mobile Number")
                    },
                    'company_name': {
                        required: "Please Enter Company Name",
                    },
                    'designation_name': {
                        required: "Please Enter Designation Name",
                    },
                    'message': {
                        required: "Please Enter Message",
                    },
                    "hiddenRecaptcha": {
                       required: "Please Fill the Captcha",
                    },
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();

                    $(form).find(':submit').prop('disabled', true);
                    $(form).find(':submit').text('Please Wait');

                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            if (response.success==true) {

                                var success_html=SUCCESS_MESSAGE;
                                $(".flash_messages").html(success_html.replace("FLASH_MESSAGE", response.message));

                                $('#exampleModal').modal('hide');

                                if ($("html, body").animate({ scrollTop: 0 }, "slow")) {
                                    setTimeout(function() { $('.alert').alert('close'); }, 5000);
                                }
                                $('.jsBrochureButton').html('<a href="' + response.brochure_url + '" class="btn-class" target="_blank"><img src="{{ asset('frontend/images/icon/sd07.png') }}" alt=""> Download Brochure</a>');
                            }
                            else
                            {
                                var error_html=ERROR_MESSAGE;
                                $(".flash_messages").html(error_html.replace("FLASH_MESSAGE", response.message));
                                if ($("html, body").animate({ scrollTop: 0 }, "slow")) {
                                    setTimeout(function() { $('.alert').alert('close'); }, 5000);
                                }
                            }
                            $(form)[0].reset();
                            $(form).find(':submit').prop('disabled', false).text('Submit');
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred: ' + xhr.responseText);
                            $(form).find(':submit').prop('disabled', false).text('Submit');
                        }
                    });
                }
            });
        </script>
    @endpush