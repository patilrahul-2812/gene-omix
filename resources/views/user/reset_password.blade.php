    @extends('layouts.admin_login')
    @section('content')
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row"></div>
                <div class="content-body">
                    <div class="auth-wrapper auth-basic px-2">
                        <div class="auth-inner my-2">
                            <!-- Reset Password basic -->
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a href="javascript:void(0)" class="brand-logo">
                                        <img src="{{ asset(getImage(getSettingData('company_logo'))) }}" style="width: 40%;">
                                    </a>
                                    <h4 class="card-title mb-1">Reset Password 🔒</h4>
                                    <p class="card-text mb-2">Your new password must be different from previously used passwords</p>
                                    {!! Form::open(['method'=>'PUT', 'route' => ['reset.password.post', $result->remember_token], 'class'=>'validate-form FormValidate', 'autocomplete' => 'off']) !!}
                                        <div class="mb-2 mt-2">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="reset-password-new">New Password</label>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input type="password" class="form-control form-control-merge" name="new_password" tabindex="2" id="new_password" autofocus/>
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-2 mt-2">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="reset-password-confirm">Confirm Password</label>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input type="password" class="form-control form-control-merge" name="confirm_new_password" tabindex="3" />
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100" tabindex="3">Set New Password</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /Reset Password basic -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.js') }}"></script>
        <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/additional-methods.min.js') }}"></script>
        <!-- END: Page Vendor JS-->

        <style type="text/css">
            .error_message_yns{
                color: red;
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

            $('.FormValidate').validate({
                rules: {
                    "email": {
                        required : true,
                        email:true,
                        validEmail:true,
                    },
                    "new_password": {
                        required : true,
                    },
                    "confirm_new_password": {
                        required : true,
                        equalTo: "#new_password"
                    },
                },
                messages: {
                    "email": {
                        required: "Please Enter Registered Email Id",
                        email:"Please Enter Valid Email Address",
                        validEmail:"Please Enter Valid Email Address",
                    },
                    "new_password": {
                        required: "Please Enter New Password",
                    },
                    "confirm_new_password": {
                        required: "Please Enter Confirm Password",
                        equalTo: "New Password is Not Match with Confirm Password"
                    },
                }
            });
        </script>
    @endsection