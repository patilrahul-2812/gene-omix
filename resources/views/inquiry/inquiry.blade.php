    @extends('layouts.front_layout')
    @section('content')
        <div class="container">
            <div class="flash_messages">
                @include('flash_messages.frontend_message')
            </div>
            <div class="title">Inquiry</div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    {!! Form::open(['method'=>'POST','route'=>['submit_inquiry'], 'class'=>'FormValidate', 'autocomplete' => 'off']) !!}
                        <div class="user__details">
                            <div class="input__box">
                                <span class="details">First Name</span>
                                {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="input__box">
                                <span class="details">Last Name</span>
                                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="input__box">
                                <span class="details">Email</span>
                                {!! Form::text('email', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="input__box">
                                <span class="details">Mobile Number</span>
                                {!! Form::text('mobile_no', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="input__box">
                                <span class="details">Date Of Birth</span>
                                {!! Form::date('date_of_birth', null, ['class'=>'form-control', 'max' => date('Y-m-d')]) !!}
                            </div>
                            <div class="input__box">
                                <span class="details">Select Course</span>
                                {!! Form::select('course_id', $list, null, ['placeholder' => 'Select Course Name']) !!}
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Register">
                        </div>
                        @if(getSettingData('company_brochure'))
                            <div class="button">
                                <a href="{{ asset('storage/'.getSettingData('company_brochure')) }}" target="_blank"><input type="button" value="Brochure"></a>
                            </div>
                        @endif
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <img src="{{ asset('frontend/assets/images/inquiry-form.jpg') }}">
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('script')
        <script type="text/javascript">
            $('.only_numbers').keyup(function(e)
            {
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });

            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z\s]+$/i.test(value);
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
            }, "Please enter valid email address");

            $(".FormValidate").validate({
                ignore: "",
                errorElement: 'label',
                errorClass: 'error_message_yns',

                rules: {
                    "first_name": {
                        required : true,
                        lettersonly: true,
                    },
                    "last_name": {
                        required : true,
                        lettersonly: true,
                    },
                    "email": {
                        required : true,
                        validEmail:true,
                    },
                    "mobile_no": {
                        required : true,
                        digits: true,
                        minlength:10,
                        maxlength:10,
                    },
                    "date_of_birth": {
                        required : true,
                    },
                    "course_id": {
                        required : true,
                    },
                    /* "hiddenRecaptcha": {
                        required: function () {
                            if (grecaptcha.getResponse() == '') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    } */
                },
                messages: {
                    "first_name": {
                        required: "Please Enter First Name",
                        lettersonly: "Please Enter Letters Only",
                    },
                    "last_name": {
                        required: "Please Enter Last Name",
                        lettersonly: "Please Enter Letters Only",
                    },
                    "email": {
                        required: "Please Enter Email",
                        validEmail:"Please Enter Valid Email Address",
                    },
                    "mobile_no": {
                        required: "Please Enter Mobile Number",
                        minlength: jQuery.validator.format("Please enter at least {0} character"),
                        maxlength: jQuery.validator.format("Please enter at least {0} character"),
                    },
                    "date_of_birth": {
                        required: "Please Select Date Of Birth",
                    },
                    "course_id": {
                        required: "Please Select Course",
                    },
                    /* "hiddenRecaptcha": {
                        required: "Please Fill The Captcha",
                    }, */
                }
            });
        </script>
    @endpush