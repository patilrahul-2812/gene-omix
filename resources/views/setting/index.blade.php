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
                            <h2 class="content-header-title float-start mb-0">Setting</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('setting.index') }}">Setting</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="modern-horizontal-wizard">
                    <div class="bs-stepper wizard-modern modern-wizard-example">
                        {!! Form::open(['method'=>'POST','route'=>['setting_submit'], 'files'=>true, 'class'=>'form-first FormValidate']) !!}
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
                                <div class="step" data-target="#image" role="tab" id="image-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Image</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#social" role="tab" id="social-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Social Link</span>
                                        </span>
                                    </button>
                                </div>
                                <!-- <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#homepage" role="tab" id="homepage-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Home Page</span>
                                        </span>
                                    </button>
                                </div> -->
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#personal-info-modern" role="tab" id="personal-info-modern-trigger">
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
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Company Name</label>
                                                {!! Form::text('config_company_name', getSettingData("config_company_name"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Company Mobile Number</label>
                                                {!! Form::text('config_company_mobile_number_header_footer', getSettingData("config_company_mobile_number_header_footer"), ['class'=>'form-control']) !!}
                                                <label class="form-label" for="first-name-column">If you want add multiple Mobile number use comma "," for separation.</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="office-time">Office Time</label>
                                                {!! Form::text('config_company_office_time', getSettingData("config_company_office_time"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Company Email </label>
                                                {!! Form::text('config_company_emails', getSettingData("config_company_emails"), ['class'=>'form-control']) !!}
                                                <p>If you want multiple Email use comma "," for separation.</p>
                                            </div>
                                        </div>
                                        <!--<div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Company Landline Number <span class="error">*</span></label>
                                                {!! Form::text('config_company_landline_number', getSettingData("config_company_landline_number"), ['class'=>'form-control']) !!}
                                                <p>If you want multiple Mobile use comma "," for separation.</p>
                                            </div>
                                        </div> -->
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Company Address </label>
                                                {!! Form::textarea('config_company_address', getSettingData("config_company_address"), ['class'=>'form-control', 'rows' => 5]) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Google Map Address Link </label>
                                                {!! Form::textarea('config_google_map_address_link', getSettingData("config_google_map_address_link"), ['class'=>'form-control', 'rows' => 5]) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Getting Contact Details Emails </label>
                                                {!! Form::textarea('config_getting_inquiry_form_email', getSettingData("config_getting_inquiry_form_email"), ['class'=>'form-control', 'rows' => 3]) !!}
                                                <label class="form-label" for="first-name-column">If you want add multiple Email use comma "," for separation.</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="ourproduct-inquiry">Getting Our Product Inquiry Email</label>
                                                {!! Form::textarea('config_getting_our_product_inquiry_form_email', getSettingData("config_getting_our_product_inquiry_form_email"), ['class'=>'form-control', 'rows' => 3]) !!}
                                                <label class="form-label" for="first-name-column">If you want add multiple Email use comma "," for separation.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h2>Counting Home Page</h2>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="awards-winning">Award Winning </label>
                                                {!! Form::text('config_awards_winning', getSettingData("config_awards_winning"), ['class'=>'form-control', 'rows' => 3]) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="happy-clients">Happy Clients </label>
                                                {!! Form::text('config_happy_clients', getSettingData("config_happy_clients"), ['class'=>'form-control', 'rows' => 3]) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="engineer-members">Engineer Members</label>
                                                {!! Form::text('config_engineer_members', getSettingData("config_engineer_members"), ['class'=>'form-control', 'rows' => 3]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Curtain is Active </label>
                                                {!! Form::select('is_banner_active', array('0'=>"No",'1'=>"Yes"), getSettingData("is_banner_active"), ['class'=>'form-select']) !!}
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <div id="image" class="content" role="tabpanel" aria-labelledby="image-trigger">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                            <div class="row input_image">
                                                <div class="col-md-12">
                                                    <label for="image_label">Company Logo</label>
                                                    <div class="input-group">
                                                        {!! Form::text('company_logo', null, ['id' => 'company-logo', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_company_logo', getSettingData('company_logo')) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="company-logo">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label for="image_label"></label>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-danger remove_image" type="button">Delete</button>
                                                    </div>
                                                </div> -->
                                                @if(!empty(getSettingData('company_logo')))
                                                    <div class="col-md-4 my-2">
                                                        <img src="{{ asset('storage/'.getSettingData('company_logo')) }}" alt="" class="img-fluid">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                            <div class="row input_image">
                                                <div class="col-md-12">
                                                    <label for="image_label">Company Fav Logo</label>
                                                    <div class="input-group">
                                                        {!! Form::text('company_fav_logo', null, ['id' => 'company-fav-logo', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_company_fav_logo', getSettingData('company_fav_logo')) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="company-fav-logo">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label for="image_label"></label>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-danger remove_image" type="button">Delete</button>
                                                    </div>
                                                </div> -->
                                                @if(!empty(getSettingData('company_fav_logo')))
                                                    <div class="col-md-4 my-2">
                                                        <img src="{{ asset('storage/'.getSettingData('company_fav_logo')) }}" alt="" style="height:100px;width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="social" class="content" role="tabpanel" aria-labelledby="social-trigger">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Facebook </label>
                                                {!! Form::text('config_facebook', getSettingData("config_facebook"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Instagram </label>
                                                {!! Form::text('config_instagram', getSettingData("config_instagram"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">LinkedIn </label>
                                                {!! Form::text('config_linkedin', getSettingData("config_linkedin"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Twitter </label>
                                                {!! Form::text('config_twitter', getSettingData("config_twitter"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">YouTube </label>
                                                {!! Form::text('config_you_tube', getSettingData("config_you_tube"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Whats App Number </label>
                                                {!! Form::text('config_whatsapp_number', getSettingData("config_whatsapp_number"), ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
                                    <h2>Home Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_home_meta_title', getSettingData("config_home_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_home_meta_keyword', getSettingData("config_home_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_home_meta_description', getSettingData("config_home_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_home_schema_tag', getSettingData("config_home_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                    </div><hr>
                                    <h2>About Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_about_meta_title', getSettingData("config_about_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_about_meta_keyword', getSettingData("config_about_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_about_meta_description', getSettingData("config_about_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_about_schema_tag', getSettingData("config_about_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_about_banner_image', null, ['id' => 'about_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_about_banner_image', getSettingData("config_about_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="about_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_about_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_about_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div><hr>
                                    <h2>Brand Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_brand_meta_title', getSettingData("config_brand_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_brand_meta_keyword', getSettingData("config_brand_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_brand_meta_description', getSettingData("config_brand_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_brand_schema_tag', getSettingData("config_brand_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_brand_banner_image', null, ['id' => 'brand_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_brand_banner_image', getSettingData("config_brand_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="brand_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_brand_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_brand_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div><hr>
                                    <h2>Services Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_services_meta_title', getSettingData("config_services_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_services_meta_keyword', getSettingData("config_services_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_services_meta_description', getSettingData("config_services_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_services_schema_tag', getSettingData("config_services_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_services_banner_image', null, ['id' => 'services_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_services_banner_image', getSettingData("config_services_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="services_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_services_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_services_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div><hr>
                                    <h2>Our Product Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_our_product_meta_title', getSettingData("config_our_product_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_our_product_meta_keyword', getSettingData("config_our_product_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_our_product_meta_description', getSettingData("config_our_product_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_our_product_schema_tag', getSettingData("config_our_product_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_our_product_banner_image', null, ['id' => 'product_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_our_product_banner_image', getSettingData("config_our_product_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="product_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_our_product_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_our_product_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div><hr>
                                    <h2>Blog Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_blog_meta_title', getSettingData("config_blog_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_blog_meta_keyword', getSettingData("config_blog_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_blog_meta_description', getSettingData("config_blog_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_blog_schema_tag', getSettingData("config_blog_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_blog_banner_image', null, ['id' => 'blog_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_blog_banner_image', getSettingData("config_blog_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="blog_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_blog_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_blog_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div><hr>
                                    <h2>Knowledge Hub Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_knowledge_hub_meta_title', getSettingData("config_knowledge_hub_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_knowledge_hub_meta_keyword', getSettingData("config_knowledge_hub_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_knowledge_hub_meta_description', getSettingData("config_knowledge_hub_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_knowledge_hub_schema_tag', getSettingData("config_knowledge_hub_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_knowledge_hub_banner_image', null, ['id' => 'knowledge_hub_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_knowledge_hub_banner_image', getSettingData("config_knowledge_hub_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="knowledge_hub_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_knowledge_hub_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_knowledge_hub_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div><hr>
                                    <h2>Our Team Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_our_team_meta_title', getSettingData("config_our_team_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_our_team_meta_keyword', getSettingData("config_our_team_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_our_team_meta_description', getSettingData("config_our_team_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_our_team_schema_tag', getSettingData("config_our_team_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_our_team_banner_image', null, ['id' => 'contact_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_our_team_banner_image', getSettingData("config_our_team_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="contact_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_our_team_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_our_team_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h2>Contact Us Page</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Title</label>
                                                {!! Form::text('config_contact_us_meta_title', getSettingData("config_contact_us_meta_title"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Keyword </label>
                                                {!! Form::text('config_contact_us_meta_keyword', getSettingData("config_contact_us_meta_keyword"), ['class'=>'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Meta Description </label>
                                                {!! Form::textarea('config_contact_us_meta_description', getSettingData("config_contact_us_meta_description"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Schema Tag  </label>
                                                {!! Form::textarea('config_contact_us_schema_tag', getSettingData("config_contact_us_schema_tag"), ['class'=>'form-control', 'rows' => 5])!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-2">
                                            <div class="row input_image">
                                                <div class="col-md-8">
                                                    <label for="image_label">Banner Image <span class="error"> (Image Size must be 950px * 470px)</span></label>
                                                    <div class="input-group">
                                                        {!! Form::text('config_contact_us_banner_image', null, ['id' => 'contact_banner_image', 'class' => 'form-control selected_image', 'aria-label' => 'Image', 'aria-describedby' => 'button-image', 'readonly']) !!}
                                                        {!! Form::hidden('edit_config_contact_us_banner_image', getSettingData("config_contact_us_banner_image"), ['class' => 'edit_image']) !!}
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary choose-file" type="button" data-id="contact_banner_image">Choose File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty(getSettingData("config_contact_us_banner_image")))
                                                    <div class="col-md-6 my-1" id="image-tag">
                                                        <img src="{{ asset('storage/'.getSettingData("config_contact_us_banner_image")) }}" alt="" style="height:100px; width:100px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>

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
        </script>
    @endsection