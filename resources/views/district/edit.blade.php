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
                            <h2 class="content-header-title float-start mb-0">District</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('district.index') }}">District</a></li>
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
                                    {!! Form::open(['method'=>'PUT','route'=>['district.update', $result->id], 'class'=>'form FormValidate', 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">State Name <span class="error">*</span></label>
                                                    {!! Form::select('state_id', $state_list, $result->state_id, ['class' => 'form-select', 'placeholder'=>'Select State Name']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">District Name <span class="error">*</span></label>
                                                    {!! Form::text('district_name', $result->district_name, ['class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Sort Order</label>
                                                    {!! Form::text('sort_order', $result->sort_order, ['class'=>'form-control only_numbers'])!!}
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
                                                <a href="{{ route('district.index') }}" class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
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
            $('.FormValidate').validate({
                rules: {
                    "state_id": {
                        required : true,
                    },
                    "district_name": {
                        required : true,
                    },
                    "status": {
                        required : true,
                    },
                },
                messages: {
                    "state_id": {
                        required: "Please Select State Name",
                    },
                    "district_name": {
                        required: "Please Enter District Name",
                    },
                    "status": {
                        required: "Please Select Status",
                    },
                }
            });
        </script>
    @endsection