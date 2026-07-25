    @extends('layouts.admin_default')
    @section('content')
        <div class="content-wrapper p-0">
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Testimonial</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Add</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    {!! Form::open(['method'=>'POST','route'=>['testimonial.store'], 'class'=>'form-first FormValidate', 'files'=>true, 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="client-name">Client Name <span class="error">*</span></label>
                                                    {!! Form::text('client_name', null, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="designation">Designation</label>
                                                    {!! Form::text('designation', null, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                                <div class="row input_image">
                                                    <div class="col-md-9">
                                                        <label for="image_label">Image <span class="error">* (Image Size Must Be 80px * 80px)</span></label>
                                                        <div class="input-group">
                                                            {!! Form::text('profile_image', null, ['id' => 'image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="image">Choose File</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="image_label"></label>
                                                        <div class="input-group-append text-xl-end text-md-end">
                                                            <button class="btn btn-danger remove_image" type="button">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Description</label>
                                                    {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 5]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Sort Order</label>
                                                    {!! Form::text('sort_order',null,['class'=>'form-control only_numbers']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="basicSelect">Status <span class="error">*</span></label>
                                                    {!! Form::select('status', status(), '', ['class' => 'form-select', 'placeholder'=>'Please Select']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <a href="{{ route('testimonial.index') }}" class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                    "student_name": {
                        required : true,
                    },
                    "image": {
                        required : true,
                    },
                    "status": {
                        required : true,
                    },
                },
                messages: {
                    "student_name": {
                        required: "Please Enter Student Name",
                    },
                    "image": {
                        required: "Please Select Image",
                    },
                    "status": {
                        required: "Please Select Status",
                    },
                }
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                $('body').on('click','.choose-file',function(event){
                    event.preventDefault();
                    inputId = $(this).data('id');
                    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
                });
            });

            // input
            let inputId = '';

            // set file link
            function fmSetLink($url) {
                document.getElementById(inputId).value = $url;
            }

            $(".remove_image").click(function(){
                var imgTable = $(this).closest('.input_image');
                imgTable.find('.selected_image').val('');
            });
        </script>
    @endsection