    @extends('layouts.front_layout')
    @section('content')
        <section class="page-title-area pt-160 pb-160" data-overlay="8" data-background="{{ asset('storage/'.getSettingData('config_contact_us_banner_image')) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <div class="border-title">
                                <h1>Contact Us</h1>
                            </div>
                            <h1>Contact Us</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- contact start -->
        <section class="contact-area gray-bg pt-120 pb-80">
            <div class="container">
                <div class="flash_messages">
                    @include('flash_messages.admin_message')
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-8">
                        <div class="contact-form mb-40">
                            <h3>Contact form</h3>
                            {!! Form::open(['method'=>'POST','route'=>['submit_contact_form'], 'class' => 'jsFormValidate']) !!}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="form-label" for="full-name">Full Name <span class="text-danger">*</span></label>
                                        {!! Form::text('full_name', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label" for="mobile-number">Mobile Number <span class="text-danger">*</span></label>
                                        {!! Form::text('mobile_no', null, ['class'=>'form-control only_numbers']) !!}
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label" for="subject">Subject <span class="text-danger">*</span></label>
                                        {!! Form::text('subject', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="form-label" for="full-name">Message <span class="text-danger">*</span></label>
                                        {!! Form::textarea('message', null, ['class'=>'form-control', 'cols' => '30', 'rows' => '10']) !!}
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-xl-12">
                                        <button class="thm-btn" type="submit" name="submit">Send Message</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-4">
                        <div class="contact-info mb-40">
                            <h3>Contact Details</h3>
                            <ul>
                                <li>
                                    <div class="contact right-info">
                                        <div class="c-right-icon">
                                            <span><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <div class="c-right-text">
                                            <p>{{ getSettingData('config_company_address') }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact right-info">
                                        <div class="c-right-icon">
                                            <span><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <div class="c-right-text">
                                            @foreach(explode(',', getSettingData('config_company_mobile_number_header_footer')) as $key => $value)
                                                <p><a href="tel: {{ $value }}"> {{ $value }}</a></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact right-info">
                                        <div class="c-right-icon">
                                            <span><i class="far fa-envelope"></i></span>
                                        </div>
                                        <div class="c-right-text">
                                            @foreach(explode(',', getSettingData('config_company_emails')) as $key => $value)
                                                <p><a href="mailto:{{ $value }}">{{ $value }}</a></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact end -->

        <!-- map start -->
        <section class="gmaps-area">
            <div class="contact-map">
                <iframe src="{{ getSettingData('config_google_map_address_link') }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
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
                    'full_name': {
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
                    'subject': {
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
                    'full_name': {
                        required: 'Please Enter Your Name'
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
                    'subject': {
                        required: "Please Enter Subject",
                    },
                    'message': {
                        required: "Please Enter Message",
                    },
                    "hiddenRecaptcha": {
                       required: "Please Fill the Captcha",
                    },
                }
            });
        </script>
    @endpush