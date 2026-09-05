    @extends('layouts.admin_default')
    @section('content')
        <div class="content-wrapper p-0">
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">About</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('about.index') }}">About</a></li>
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
                                    {!! Form::open(['method'=>'PUT','route'=>['about.update', $result->id], 'class'=>'form-first FormValidate', 'files'=>true, 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Title</label>
                                                    {!! Form::text('title', $result->title, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">About Description</label>
                                                    {!! Form::textarea('about_desc', $result->about_desc, ['class' => 'form-control ckeditor']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Number Years of Experience</label>
                                                    {!! Form::text('years_of_experience', $result->years_of_experience, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                                <div class="row input_image">
                                                    <div class="col-md-9">
                                                        <label for="image_label">Experience Image <span class="text-danger">(Image Size Must be 540px * 400px)</span></label>
                                                        <div class="input-group">
                                                            {!! Form::text('experience_img', null, ['id' => 'desc-image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                            {!! Form::hidden('edit_experience_img', $result->experience_img, ['class' => 'form-control edit_image']) !!}
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="desc-image">Choose File</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="image_label"></label>
                                                        <div class="input-group-append text-xl-end text-md-end">
                                                            <button class="btn btn-danger remove_image" type="button">Delete</button>
                                                        </div>
                                                    </div>
                                                    @if(!empty($result->experience_img))
                                                        <div class="col-md-6 my-1" id="image-tag">
                                                            <img src="{{ asset('storage/'.$result->experience_img) }}" alt="" style="height:100px; width:100px">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Vision</label>
                                                    {!! Form::textarea('vision', $result->vision, ['class'=>'form-control', 'rows' => '5']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Mission</label>
                                                    {!! Form::textarea('mission', $result->mission, ['class'=>'form-control', 'rows' => '5']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                                <div class="row input_image">
                                                    <div class="col-md-9">
                                                        <label for="image_label">Distribution Network Image <span class="text-danger">(Image Size Must be 1450px * 1150px)</span></label>
                                                        <div class="input-group">
                                                            {!! Form::text('distribution_network_img', null, ['id' => 'vis-mis-image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                            {!! Form::hidden('edit_distribution_network_img', $result->distribution_network_img, ['class' => 'form-control edit_image']) !!}
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary choose-file" type="button" data-id="vis-mis-image">Choose File</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="image_label"></label>
                                                        <div class="input-group-append text-xl-end text-md-end">
                                                            <button class="btn btn-danger remove_image" type="button">Delete</button>
                                                        </div>
                                                    </div>
                                                    @if(!empty($result->distribution_network_img))
                                                        <div class="col-md-6 my-1" id="image-tag">
                                                            <img src="{{ asset('storage/'.$result->distribution_network_img) }}" alt="" style="height:100px; width:100px">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-12 mt-2">
                                                <strong><h4>Our Collaborators</h4></strong></label>
                                                <table id="ourclient" class="table table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php 
                                                            $multiple_img_count = 0;
                                                        @endphp
                                                        @if(!empty($result->our_clients))
                                                            @foreach(json_decode($result['our_clients'], true) as $rtimgkey => $rtimgvalue)
                                                                <tr id="multiimage{{ $multiple_img_count }}">
                                                                    <td>
                                                                        <div class="row input_image">
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" name="multiple_image[{{ $multiple_img_count }}][image]" id="image{{ $multiple_img_count }}" class="form-control selected_image" aria-label="Image" aria-describedby="button-image" readonly>
                                                                                    <input type="hidden" name="multiple_image[{{ $multiple_img_count }}][edit_image]" value="{{ $rtimgvalue['image'] }}">
                                                                                    <div class="input-group-append">
                                                                                        <button class="btn btn-outline-secondary choose-file" type="button" data-id="image{{ $multiple_img_count }}">Choose File</button>
                                                                                    </div>
                                                                                </div>
                                                                                <span class="text-danger">(Image Size Must be 225px * 55px)</span>
                                                                            </div>
                                                                            @if(!empty($rtimgvalue['image']))
                                                                                <div class="col-xl-4 col-md-4 col-12 text-center my-2" id="image-tag">
                                                                                    <img src="{{ asset('storage/'.$rtimgvalue['image']) }}" alt="" style="height:100px; width:100px">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-danger" onclick="$('#multiimage{{ $multiple_img_count }}').remove()">X</button>
                                                                    </td>
                                                                </tr>
                                                                @php 
                                                                    $multiple_img_count++;
                                                                @endphp
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <button type="button" class="btn btn-success text-center edit-multi-image" onclick="edit_multiimage({{ $multiple_img_count + 1 }})">+</button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-12 mt-2">
                                                <strong><h4>Core Values</h4></strong>
                                                <table id="core-values" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $coreValues = json_decode($result->core_values, true) ?: [];
                                                        @endphp
                                                        @foreach($coreValues as $coreValueIndex => $coreValue)
                                                            <tr id="core-value-{{ $coreValueIndex }}">
                                                                <td>
                                                                    <input type="text" name="core_values[{{ $coreValueIndex }}][title]" value="{{ $coreValue['title'] ?? '' }}" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <textarea name="core_values[{{ $coreValueIndex }}][description]" class="form-control" rows="3">{{ $coreValue['description'] ?? '' }}</textarea>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger" onclick="$('#core-value-{{ $coreValueIndex }}').remove()">X</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td><button type="button" class="btn btn-success" onclick="add_core_value()">+</button></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
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

        <script>
            var edit_row_count = 0;
            var core_value_row_count = {{ count(json_decode($result->core_values, true) ?: []) }};

            function add_core_value()
            {
                var rowId = core_value_row_count++;
                var coreValueHtml = `<tr id="core-value-${rowId}">
                    <td><input type="text" name="core_values[${rowId}][title]" class="form-control"></td>
                    <td><textarea name="core_values[${rowId}][description]" class="form-control" rows="3"></textarea></td>
                    <td><button type="button" class="btn btn-danger" onclick="$('#core-value-${rowId}').remove()">X</button></td>
                </tr>`;
                $('#core-values tbody').append(coreValueHtml);
            }

            function edit_multiimage(multiple_row_edit)
            {
                if(multiple_row_edit == 2)
                {
                    edit_row_count = multiple_row_edit;
                }
                else if(multiple_row_edit == 1 && edit_row_count == 0)
                {
                    edit_row_count = 1;
                }
                else if(multiple_row_edit > 2)
                {
                    edit_row_count = multiple_row_edit;
                }

                edit_row_count++;

                edit_html = `<tr id="row`+ multiple_row_edit +`">
                                <td>
                                    <div class="row input_image">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                {!! Form::text('multiple_image[`+ multiple_row_edit +`][image]', null, ['id' => 'image`+ multiple_row_edit +`', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                {!! Form::hidden('multiple_image[`+ multiple_row_edit +`][edit_image]', '', []) !!}
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary choose-file" type="button" data-id="image`+ multiple_row_edit +`">Choose File</button>
                                                </div>
                                            </div>
                                            <span class="text-danger">(Image Size Must be 225px * 55px)</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger text-center" onclick="$('#row`+ multiple_row_edit +`').remove()">X</button>
                                </td>
                            </tr>`;
                $('#ourclient tbody').append(edit_html);
                $('.edit-multi-image').attr('onclick','edit_multiimage("'+ edit_row_count +'")');
            }
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

            /*$(".remove_image").click(function(){
                var imgTable = $(this).closest('.input_image');
                column_name = imgTable.find('.selected_image').attr('name');
                $.ajax({
                    url: "{{ route('about.update.image') }}",
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
            });*/
        </script>
    @endsection
