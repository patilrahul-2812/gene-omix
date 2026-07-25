    @extends('layouts.admin_default')
    @section('content')
        <div class="content-wrapper p-0">
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Why Choose Us</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('whychoose.index') }}">Why Choose Us</a></li>
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
                                    {!! Form::open(['method'=>'PUT','route'=>['whychoose.update', $result->id], 'class'=>'form-first FormValidate', 'files'=>true, 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <div class="col-xl-12 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Description</label>
                                                    {!! Form::textarea('description', $result->description, ['class' => 'form-control ckeditor']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row input_image">
                                                    <div class="col-md-9">
                                                        <label for="image_label">About Us Page Image </label>
                                                        <div class="input-group">
                                                            {!! Form::text('about_pg_img', null, ['id' => 'about-image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                            {!! Form::hidden('edit_about_pg_img', $result->about_pg_img, ['class' => 'form-control']) !!}
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="about-image">Choose File</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="image_label"></label>
                                                        <div class="input-group-append text-xl-end text-md-end">
                                                            <button class="btn btn-danger remove_image" type="button">Delete</button>
                                                        </div>
                                                    </div>
                                                    @if(!empty($result->about_pg_img))
                                                        <div class="col-md-6 my-1" id="image-tag">
                                                            <img src="{{ asset('storage/'.$result->about_pg_img) }}" alt="" style="height:100px; width:100px">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h2>Our Speciality</h2>                                        
                                        <table id="ourspeciality" class="table table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Icon</th>
                                                    <th>Title</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                    $speciality_count = 0;
                                                @endphp
                                                @if(!empty($result->our_speciality))
                                                    @foreach(json_decode($result->our_speciality) as $spkey => $spvalue)
                                                        <tr id="row{{ $speciality_count }}">
                                                            <td>
                                                                <div class="row input_image">
                                                                    <div class="col-md-8">
                                                                        <label for="image_label">Image <span class="error">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="our_speciality[{{ $speciality_count }}][image]" id="image{{ $speciality_count }}" class="form-control selected_image" aria-label="Image" aria-describedby="button-image" readonly>
                                                                            <input type="hidden" name="our_speciality[{{ $speciality_count }}][edit_image]" value="{{ $spvalue->image }}">
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="image{{ $speciality_count }}">Choose File</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if(!empty($spvalue->image))
                                                                        <div class="col-xl-4 col-md-4 col-12 text-center my-2" id="image-tag">
                                                                            <img src="{{ asset('storage/'.$spvalue->image) }}" alt="" style="height:100px; width:100px">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="our_speciality[{{ $speciality_count }}][title]" class="form-control" value="{{ $spvalue->title }}">
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger pull-right" onclick="$('#row{{ $speciality_count }}').remove()">X</button>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $speciality_count++;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success pull-right add-our-speciality" onclick="edit_ourspeciality({{ $speciality_count + 1 }})">+</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <hr>
                                        <h2>Rotating Image</h2>
                                        <table id="rotatingimage" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Background Color</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                    $rotat_img_count = 0;
                                                @endphp
                                                @if(!empty($result->rotating_images))
                                                    @foreach(json_decode($result['rotating_images'], true) as $rtimgkey => $rtimgvalue)
                                                        <tr id="rotimage{{ $rotat_img_count }}">
                                                            <td>
                                                                <div class="row input_image">
                                                                    <div class="col-md-8">
                                                                        <label for="image_label">Image <span class="error">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="rotating_images[{{ $rotat_img_count }}][image]" id="image{{ $rotat_img_count }}" class="form-control selected_image" aria-label="Image" aria-describedby="button-image" readonly>
                                                                            <input type="hidden" name="rotating_images[{{ $rotat_img_count }}][edit_image]" value="{{ $rtimgvalue['image'] }}">
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="rotateimage{{ $rotat_img_count }}">Choose File</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if(!empty($rtimgvalue['image']))
                                                                        <div class="col-xl-4 col-md-4 col-12 text-center my-2" id="image-tag">
                                                                            <img src="{{ asset('storage/'.$rtimgvalue['image']) }}" alt="" style="height:100px; width:100px">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="color" name="rotating_images[{{ $rotat_img_count }}][bg_color]" class="form-control" value="{{ $rtimgvalue['bg_color'] }}">
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger pull-right" onclick="$('#rotimage{{ $rotat_img_count }}').remove()">X</button>
                                                            </td>
                                                        </tr>
                                                        @php 
                                                            $rotat_img_count++;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success pull-right add-rotating-image" onclick="edit_rotatingimage({{ $rotat_img_count + 1 }})">+</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <!-- <hr>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Why Are We Different</label>
                                                    {!! Form::textarea('why_are_we_different', $result->why_are_we_different, ['class' => 'form-control ckeditor']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Why Are We Unique</label>
                                                    {!! Form::textarea('why_are_we_unique', $result->why_are_we_unique, ['class' => 'form-control ckeditor']) !!}
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <a href="{{ route('slider.index') }}" class="btn btn-outline-secondary">Back</a>
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

        <script type="text/javascript">
            $('.FormValidate').validate({
                rules: {
                    "title": {
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
                    "title": {
                        required: "Please Enter Title",
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

        <script>
            var edit_row_count = 0;
            function edit_ourspeciality(spec_row_edit)
            {
                if(spec_row_edit == 2)
                {
                    edit_row_count = spec_row_edit;
                }
                else if(spec_row_edit == 1 && edit_row_count == 0)
                {
                    edit_row_count = 1;
                }
                else if(spec_row_edit > 2)
                {
                    edit_row_count = spec_row_edit;
                }

                edit_row_count++;
                
                edithtml = `<tr id="row`+ spec_row_edit +`">
                            <td>
                                <div class="row input_image">
                                    <div class="col-md-8">
                                        <label for="image_label">Image <span class="error">*</span></label>
                                        <div class="input-group">
                                            {!! Form::text('our_speciality[`+ spec_row_edit +`][image]', null, ['id' => 'image`+ spec_row_edit +`', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                            {!! Form::hidden('our_speciality[`+ spec_row_edit +`][edit_image]', '', []) !!}
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="image`+ spec_row_edit +`">Choose File</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="our_speciality[`+ spec_row_edit +`][title]" class="form-control">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger pull-right" onclick="$('#row`+ spec_row_edit +`').remove()">X</button>
                            </td>
                        </tr>`;
                $("#ourspeciality tbody").append(edithtml);
                $('.add-our-speciality').attr('onclick','edit_ourspeciality("'+ edit_row_count +'")');
            }

            var edit_rotatecount = 0;
            function edit_rotatingimage(rot_row_edit)
            {
                if(rot_row_edit == 2)
                {
                    edit_rotatecount = rot_row_edit;
                }
                else if(rot_row_edit == 1 && edit_rotatecount == 0)
                {
                    edit_rotatecount = 1;
                }
                else if(rot_row_edit > 2)
                {
                    edit_rotatecount = rot_row_edit;
                }

                edit_rotatecount++;

                edit_rotatehtml = `<tr id="rotimage`+ rot_row_edit +`">
                                <td>
                                    <div class="row input_image">
                                        <div class="col-md-8">
                                            <label for="image_label">Image <span class="error">*</span></label>
                                            <div class="input-group">
                                                {!! Form::text('rotating_images[`+ rot_row_edit +`][image]', null, ['id' => 'rotateimage`+ rot_row_edit +`', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                {!! Form::hidden('rotating_images[`+ rot_row_edit +`][edit_image]', null, []) !!}
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary choose-file" type="button" data-id="rotateimage`+ rot_row_edit +`">Choose File</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="color" name="rotating_images[`+ rot_row_edit +`][bg_color]" class="form-control">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger pull-right" onclick="$('#rotimage`+ rot_row_edit +`').remove()">X</button>
                                </td>
                            </tr>`;
                
                $('#rotatingimage tbody').append(edit_rotatehtml);
                $('.add-rotating-image').attr('onclick','edit_rotatingimage("'+ edit_rotatecount +'")');
            }
        </script>
    @endsection