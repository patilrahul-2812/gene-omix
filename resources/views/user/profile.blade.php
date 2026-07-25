@extends('layouts.admin_default')
    @section('content')

        <div class="content-wrapper p-0">
            <div class="flash_messages">
                @include('flash_messages.admin_message')
            </div>
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Profile</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active"> Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-2">
                            <!-- account -->
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.profile') }}">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Profile</span>
                                </a>
                            </li>
                            <!-- security -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('changepassword') }}">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Change Password</span>
                                </a>
                            </li>
                        </ul>

                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Profile Details</h4>
                            </div>
                            <div class="card-body">
                                <!-- form -->
                                <form action="{{ route('admin.updateprofile') }}" method="post" class="validate-form mt-2 pt-50 FormValidate">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12  mb-1">
                                            <label class="form-label" for="accountFirstName">First Name</label>
                                            <input type="text" class="form-control" name="first_Name" value="{{ $user['first_name'] }}"/>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12  mb-1">
                                            <label class="form-label" for="accountLastName">Last Name</label>
                                            <input type="text" class="form-control" name="last_Name" value="{{ $user['last_name'] }}"/>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12  mb-1">
                                            <label class="form-label" for="accountEmail">Email <span class="error">*</span></label>
                                            <input type="text" class="form-control" name="email" value="{{ $user['email'] }}" />
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12  mb-1">
                                            <label class="form-label" for="accountPhoneNumber">Phone Number <span class="error">*</span></label>
                                            <input type="text" class="form-control account-number-mask only_numbers" name="mobile_no" value="{{ $user['mobile_no'] }}" />
                                            <span class="error">{{ $errors->first('mobile_no') }}</span>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.js') }}"></script>

        <style type="text/css">
            .error{
                color: red;
            }
        </style>

        <script type="text/javascript">
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
            }, "Please enter valid email address");

            $('.FormValidate').validate({
                rules: {
                    "email_id": {
                        required : true,
                        email:true,
                        validEmail:true,
                    },
                    "mobile_no": {
                        required : true,
                        digits: true,
                    },
                },
                messages: {
                    "email_id": {
                        required: "Please Enter Email",
                        email:"Please Enter Valid Email Address",
                        validEmail:"Please Enter Valid Email Address",
                    },
                    "mobile_no": {
                        required: "Please Enter Mobile Number",
                    },
                }
            });
        </script>
    @endsection