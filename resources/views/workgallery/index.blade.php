    @extends('layouts.admin_default')
    @section('content')
        <div class="content-wrapper p-0">
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">WorkGallery</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('workgallery.index') }}">WorkGallery</a></li>
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
                                    {!! Form::open(['method'=>'PUT','route'=>['workgallery.update', $workgallery->id], 'class'=>'form-first FormValidate', 'files'=>true, 'autocomplete' => 'off']) !!}
                                        <table id="ourspeciality" class="table table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                    $speciality_count = 0;
                                                @endphp
                                                @if(!empty($workgallery->image))
                                                    @foreach(json_decode($workgallery->image) as $spkey => $spvalue)
                                                        <tr id="row{{ $speciality_count }}">
                                                            <td>
                                                                <div class="row input_image">
                                                                    <div class="col-md-8">
                                                                        <label for="image_label">Image <span class="error">* (Image Size must be 600px * 400px)</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="image[{{ $speciality_count }}][image]" id="image{{ $speciality_count }}" class="form-control selected_image" aria-label="Image" aria-describedby="button-image" readonly>
                                                                            <input type="hidden" name="image[{{ $speciality_count }}][edit_image]" value="{{ $spvalue->image }}">
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
                                                    <td>
                                                        <button type="button" class="btn btn-success pull-right add-our-speciality" onclick="edit_ourspeciality({{ $speciality_count + 1 }})">+</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
                                        <label for="image_label">Image <span class="error">* (Image Size must be 600px * 400px)</span></label>
                                        <div class="input-group">
                                            {!! Form::text('image[`+ spec_row_edit +`][image]', null, ['id' => 'image`+ spec_row_edit +`', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                            {!! Form::hidden('image[`+ spec_row_edit +`][edit_image]', '', []) !!}
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="image`+ spec_row_edit +`">Choose File</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger pull-right" onclick="$('#row`+ spec_row_edit +`').remove()">X</button>
                            </td>
                        </tr>`;
                $("#ourspeciality tbody").append(edithtml);
                $('.add-our-speciality').attr('onclick','edit_ourspeciality("'+ edit_row_count +'")');
            }
        </script>
    @endsection