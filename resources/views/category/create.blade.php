    @extends('layouts.admin_default')
    @section('content')
        <div class="content-wrapper p-0">
            <div class="content-header row">
                <div class="content-header-left col-xl-9 col-md-12 col-12 mb-xl-2 mb-md-2 mb-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Course Category</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Course Category</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Add</a></li>
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
                                    {!! Form::open(['method'=>'POST','route'=>['category.store'], 'class'=>'form FormValidate', 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Course Category Name <span class="error">*</span></label>
                                                    {!! Form::text('category_name',null,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Sort Order</label>
                                                    {!! Form::text('sort_order',null,['class'=>'form-control only_numbers']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="basicSelect">Status <span class="error">*</span></label>
                                                    {!! Form::select('status', status(), '', ['class' => 'form-select', 'placeholder'=>'Please Select']) !!}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Back</a>
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
    @endsection
    @push('script')
        <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.js') }}"></script>

        <script type="text/javascript">
            $('.FormValidate').validate({
                rules: {
                    "category_name": {
                        required : true,
                    },
                    "status": {
                        required : true,
                    },
                },
                messages: {
                    "category_name": {
                        required: "Please Enter Course Category Name",
                    },
                    "status": {
                        required: "Please Select Status",
                    },
                }
            });
        </script>
    @endpush