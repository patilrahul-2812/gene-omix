    @extends('layouts.admin_login')
    @section('content')
        <x-alert class="bg-green-700 text-green-100 p-4" />
        <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
        <div class="app-content content ">
            <div class="content-wrapper">
                <div class="content-body">
                    <div class="auth-wrapper auth-basic px-2">
                        <div class="auth-inner my-2">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="flash_messages">
                                        @include('flash_messages.admin_message')
                                    </div>
                                    <a href="javascript:void(0);" class="brand-logo">
                                        <img src="{{ asset(getImage(getSettingData('company_logo'))) }}" style="width: 50%;">
                                    </a>
                                    <form class="jsFormValidate mt-2" action="{{ route('admin.login_submit')}}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="mb-1 position-relative">
                                            <label for="login-email" class="form-label">Email Id</label>
                                            <input type="text" class="form-control" name="email" autofocus />
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        </div>
                                        <div class="mb-1">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="login-password">Password</label>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addNewCard">
                                                    <small>Forgot Password?</small>
                                                </a>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input type="password" class="form-control form-control-merge" name="password" />
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        </div>
                                        <div class="mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addNewCard" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h1 class="text-center mb-1" id="addNewCardTitle">Forgot Password?<i class="fa-solid fa-lock"></i></h1>
                        <p class="text-center">Enter your email and we'll send you instructions to reset your password</p>

                        <!-- form -->
                        {!! Form::open(['method'=>'POST','route'=>['user.forgot_password'], 'class'=>'row gy-1 gx-2 mt-75 reset-password-form']) !!}
                            <div class="mb-1 position-relative">
                                <label for="login-email" class="form-label">Email Id</label>
                                <input type="text" class="form-control" name="email"/>
                                <small class="text-danger">{{ $errors->first('email_id') }}</small>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.js') }}"></script>
        <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/additional-methods.min.js') }}"></script>
        <!-- END: Page Vendor JS-->

        <style type="text/css">
            .error_message_yns{
                color: red;
            }
            .error_message_yns:nth-child(3){
                position: absolute;
                top: 100%;
                font-size:12px
            }
            .input-group   .error_message_yns:nth-child(2){
                position: absolute;
                top: 100%;
                font-size:12px
            }
        </style>

        <script>
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

            $(".jsFormValidate").validate({
                ignore: "",
                errorElement: 'label',
                errorClass: 'error_message_yns',

                rules: {
                    "email": {
                        required : true,
                        email:true,
                        validEmail:true,
                    },
                    "password": {
                        required : true,
                    },
                },
                messages: {
                    "email": {
                        required: "Please Enter Email Id",
                        email:"Please Enter Valid Email Address",
                        validEmail:"Please Enter Valid Email Address",
                    },
                    "password": {
                        required: "Please Enter Password",
                    },
                }
            });

            $(".reset-password-form").validate({
                ignore: "",
                errorElement: 'label',
                errorClass: 'error_message_yns',

                rules: {
                    "email": {
                        required : true,
                        email:true,
                        validEmail:true,
                    },
                },
                messages: {
                    "email": {
                        required: "Please Enter Email",
                        email:"Please Enter Valid Email Address",
                        validEmail:"Please Enter Valid Email Address",
                    },
                }
            });
        </script>
    @endsection