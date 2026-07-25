    @extends('layouts.admin_default')
    @section('content')
        <div class="content-wrapper p-0">
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Our Team</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('ourteam.index') }}">Our Team</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit</a></li>
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
                                    {!! Form::open(['method'=>'PUT','route'=>['ourteam.update', $ourteam->id], 'class'=>'form-first FormValidate', 'files'=>true, 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="select-department">Select Department <span class="text-danger">*</span></label>
                                                    {!! Form::select('department_id', $department_list, $ourteam->department_id, ['class'=>'form-select', 'placeholder' => 'Select Department']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="select-designation">Select Designation <span class="text-danger">*</span></label>
                                                    {!! Form::select('designation_id', $designation_list, $ourteam->designation_id, ['class'=>'form-select', 'placeholder' => 'Select Designation']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Team Member Name <span class="text-danger">*</span></label>
                                                    {!! Form::text('name', $ourteam->name, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="official-email-id">Official Email Id </label>
                                                    {!! Form::text('email', $ourteam->email, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="facebook-link">Facebook Link </label>
                                                    {!! Form::text('facebook', $ourteam->facebook, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="linkedin-link">LinkedIn Profile Link </label>
                                                    {!! Form::text('linkedin', $ourteam->linkedin, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="instagram-link">Instagram Profile Link </label>
                                                    {!! Form::text('instagram', $ourteam->instagram, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                                <div class="row input_image">
                                                    <div class="col-md-9">
                                                        <label for="image_label">Profile Image <span class="text-danger">(Image Size must be 270px * 290px)</span></label>
                                                        <div class="input-group">
                                                            {!! Form::text('profile_image', null, ['id' => 'image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                            {!! Form::hidden('edit_image', $ourteam->profile_image, ['class' => 'edit_image']) !!}
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
                                                    @if(!empty($ourteam->profile_image))
                                                        <div class="col-md-6 my-1" id="image-tag">
                                                            <img src="{{ asset('storage/'.$ourteam->profile_image) }}" alt="" style="height:100px; width:100px">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="basicSelect">Status <span class="error">*</span></label>
                                                    {!! Form::select('status', status(), $ourteam->status, ['class' => 'form-select', 'placeholder'=>'Please Select']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <a href="{{ route('ourteam.index') }}" class="btn btn-outline-secondary">Back</a>
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

        <script type="text/javascript">
            $('.FormValidate').validate({
                rules: {
                    "department_id": {
                        required : true,
                    },
                    "designation_id": {
                        required : true,
                    },
                    "name": {
                        required : true,
                    },
                    "status": {
                        required : true,
                    },
                },
                messages: {
                    "department_id": {
                        required: "Please Select Department",
                    },
                    "designation_id": {
                        required: "Please Select Designation",
                    },
                    "name": {
                        required: "Please Enter Team Member Name",
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

                if (imgTable.find('.selected_image').val() == '') {
                    column_name = imgTable.find('.selected_image').attr('name');
                    $.ajax({
                        url: "{{ route('ourteam.update.image') }}",
                        type: "POST",
                        data : {
                            "id" : {{ $ourteam->id }},
                            'column_name' : column_name,
                            "_token": "{{ csrf_token() }}"
                        },
                        success:function(response)
                        {
                            if (response.status==true)
                            {
                                imgTable.find('#image-tag').hide();
                                imgTable.find('.edit_image').val('');
                            }
                        }
                    });
                }
                else {
                    imgTable.find('.selected_image').val('');
                }
            });
        </script>
    @endsection