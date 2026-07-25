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
                            <h2 class="content-header-title float-start mb-0">Service</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Service</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Add</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="modern-horizontal-wizard">
                    <div class="bs-stepper wizard-modern modern-wizard-example">
                        {!! Form::open(['method'=>'POST','route'=>['service.store'], 'files' => true, 'class' => 'form-first jsFormValidate']) !!}
                            <div class="bs-stepper-header">
                                <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">General</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#seo" role="tab" id="seo-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">SEO</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="services-name">Services Name <span class="error">*</span></label>
                                                {!! Form::text('service_name', null, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-1">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error">(Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('banner_image', null, ['id' => 'banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="image_label"></label>
                                                    <div class="input-group-append text-xl-end text-md-end">
                                                        <button class="btn btn-danger remove_image" type="button">Remove Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Icon <span class="error">* (Image Size must be 65px * 65px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('icon', null, ['id' => 'icon', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="icon">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="image_label"></label>
                                                    <div class="input-group-append text-xl-end text-md-end">
                                                        <button class="btn btn-danger remove_image" type="button">Remove Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Image <span class="error"> (Image Size must be 765px * 430px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('image', null, ['id' => 'image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="image_label"></label>
                                                    <div class="input-group-append text-xl-end text-md-end">
                                                        <button class="btn btn-danger remove_image" type="button">Remove Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Alt Tag </label>
                                                {!! Form::text('image_alt_tag', null, ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="description">Description</label>
                                                {!! Form::textarea('description', null, ['class' => 'form-control ckeditor']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Sort Order</label>
                                                {!! Form::text('sort_order', null, ['class'=>'form-control only_numbers'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicSelect">Status <span class="error">*</span></label>
                                                {{Form::select('status', status(), '', ['class' => 'form-select', 'placeholder'=>'Please Select'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="seo" class="content" role="tabpanel" aria-labelledby="seo-trigger">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Seo Url</label>
                                                {!! Form::text('seo_url', null, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('meta_title', null, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="meta-keyword">Meta Keyword </label>
                                                {!! Form::text('meta_keyword', null, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="meta-description">Meta Description </label>
                                                {!! Form::textarea('meta_description', null, ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('schema_tag', null, ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                        <a href="{{ route('service.index') }}" class="btn btn-outline-secondary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    @endsection

    @push('script')
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

            $('.jsFormValidate').validate({
                rules:{
                    'service_name':{
                        required: true
                    },
                    'icon': {
                        required: true
                    },
                    'status': {
                        required: true
                    }
                },
                messages:{
                    'service_name': {
                        required: "Please Enter Service Name"
                    },
                    'icon': {
                        required: 'Please Select Icon'
                    },
                    'status': {
                        required: 'Please Select Status'
                    }
                }
            });
        </script>
    @endpush