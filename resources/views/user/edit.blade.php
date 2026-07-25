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
                            <h2 class="content-header-title float-start mb-0">Vigilance</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('district.index') }}">Vigilance</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    {!! Form::open(['method'=>'PUT','route'=>['user.update', $result->id], 'class'=>'form FormValidate', 'autocomplete' => 'off']) !!}
                                        {!! Form::hidden('id', $result->id) !!}
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">First Name <span class="error">*</span></label>
                                                    {!! Form::text('first_name', $result->first_name, ['class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Middle Name <span class="error">*</span></label>
                                                    {!! Form::text('middle_name', $result->middle_name, ['class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Last Name <span class="error">*</span></label>
                                                    {!! Form::text('last_name', $result->last_name, ['class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Email Id <span class="error">*</span></label>
                                                    {!! Form::text('email_id', $result->email_id, ['class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Mobile Number <span class="error">*</span></label>
                                                    {!! Form::text('mobile_no', $result->mobile_no, ['class'=>'form-control only_numbers'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Password </label>
                                                    {!! Form::text('password', null, ['class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="basicSelect">Status <span class="error">*</span></label>
                                                    {{Form::select('status', status(), $result->status, ['class' => 'form-select', 'placeholder'=>'Please Select'])}}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->
            </div>
        </div>

        <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.js') }}"></script>

        <style type="text/css">
            .error{
                color: red;
            }
        </style>

        <script type="text/javascript">
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
                    "first_name": {
                        required : true,
                    },
                    "middle_name": {
                        required : true,
                    },
                    "last_name": {
                        required : true,
                    },
                    "email_id": {
                        required : true,
                        email:true,
                        validEmail:true,
                        remote:
                        {
                            data: {
                                '_token': token,
                            },
                            url: "{{ route('user_check_duplication') }}",
                            type: "post",
                        },
                    },
                    "mobile_no": {
                        required : true,
                        digits: true,
                        minlength:10,
                        maxlength:10,
                    },
                    "status": {
                        required : true,
                    },
                },
                messages: {
                    "first_name": {
                        required: "Please Enter First Name",
                    },
                    "middle_name": {
                        required: "Please Enter Middle Name",
                    },
                    "last_name": {
                        required: "Please Enter Last Name",
                    },
                    "email_id": {
                        required: "Please Enter Email Id",
                        email:"Please Enter Valid Email Address",
                        validEmail:"Please Enter Valid Email Address",
                        remote: "This email id already exist."
                    },
                    "mobile_no": {
                        required: "Please Enter Mobile Number",
                        minlength: jQuery.validator.format("Please enter at least {0} character"),
                        maxlength: jQuery.validator.format("Please enter at least {0} character"),
                    },
                    "status": {
                        required: "Please Select Status",
                    },
                }
            });
        </script>
    @endsection