    @extends ('layouts.admin_default')
    @section('content')
        <style>
            #new_password-error.error {
                position: absolute;
                top: 100%;
            }
            #confirm_new_password-error.error {
                position: absolute;
                top: 100%;
            }
        </style>
        <div class="content-wrapper p-0">
            <div class="flash_messages">
                @include('flash_messages.admin_message')
            </div>
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Change Password</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Change Password</li>
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
                                <a class="nav-link" href="{{ route('admin.profile') }}">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Account</span>
                                </a>
                            </li>
                            <!-- security -->
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('changepassword') }}">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Change Password</span>
                                </a>
                            </li>
                        </ul>
                        <!-- security -->

                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body pt-1">
                                <!-- form -->
                                {!! Form::open(['method'=>'PUT', 'route' => ['update_password'], 'class'=>'validate-form FormValidate', 'autocomplete' => 'off']) !!}
                                    <div class="row">
                                        <div class="col-12 col-xl-4 col-md-6 col-12 mb-1">
                                            <label class="form-label" for="account-new-password">Old Password <span class="error">*</span></label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            <span class="error">{{ $errors->first('old_password') }}</span>
                                        </div>
                                        <div class="col-12 col-xl-4 col-md-6 col-12 mb-1">
                                            <label class="form-label" for="account-new-password">New Password <span class="error">*</span></label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter New Password" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            <span class="error">{{ $errors->first('new_password') }}</span>
                                        </div>
                                        <div class="col-12 col-xl-4 col-md-6 col-12 mb-1">
                                            <label class="form-label" for="account-retype-new-password">Confirm Password <span class="error">*</span></label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account-retype-new-password" name="confirm_new_password" placeholder="Confirm your new password" />
                                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                            </div>
                                            <span class="error">{{ $errors->first('confirm_new_password') }}</span>
                                        </div>
                                        <div class="col-12">
                                            <p class="fw-bolder">Password requirements:</p>
                                            <ul class="ps-1 ms-25">
                                                <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                                                <li class="mb-50">At least one lowercase character</li>
                                                <li>At least one number, symbol, or whitespace character</li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1 mt-1">Save Changes</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
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
            $('.FormValidate').validate({
                rules: {
                    "old_password": {
                        required : true,
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
                    "old_password": {
                        required: "Please Enter Old Password",
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