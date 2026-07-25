    @extends('layouts.admin_default')
    @section('content')
        <div class="content-wrapper p-0">
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Slider</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
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
                                    {!! Form::open(['method'=>'PUT','route'=>['slider.update', $result->id], 'class'=>'form-first FormValidate', 'files'=>true, 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <div class="col-xl-3 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Title1</label>
                                                    {!! Form::text('title1', $result->title1, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="title1-color">Title1 Color</label>
                                                    {!! Form::color('title1_color', $result->title1_color, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="title2">Title2 </label>
                                                    {!! Form::text('title2', $result->title2, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="title2-color">Title2 Color</label>
                                                    {!! Form::color('title2_color', $result->title2_color, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                                <div class="row input_image">
                                                    <div class="col-md-9">
                                                        <label for="image_label">Image <span class="text-danger">* (Image Size must be 1920px * 800px)</span></label>
                                                        <div class="input-group">
                                                            {!! Form::text('image', null, ['id' => 'image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                            {!! Form::hidden('edit_image', $result->image, ['class' => 'edit_image']) !!}
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
                                                    @if(!empty($result->image))
                                                        <div class="col-md-6 my-1" id="image-tag">
                                                            <img src="{{ asset('storage/'.$result->image) }}" alt="" style="height:100px; width:100px">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Alt Tag </label>
                                                    {!! Form::text('alt_tag', $result->alt_tag, ['class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Sort Order</label>
                                                    {!! Form::text('sort_order', $result->sort_order, ['class'=>'form-control only_numbers']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="basicSelect">Status <span class="error">*</span></label>
                                                    {!! Form::select('status', status(), $result->status, ['class' => 'form-select', 'placeholder'=>'Please Select']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <a href="{{ route('slider.index') }}" class="btn btn-outline-secondary">Back</a>
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
                    "title": {
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
                        url: "{{ route('slider.update.image') }}",
                        type: "POST",
                        data : {
                            "id" : {{ $result->id }},
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