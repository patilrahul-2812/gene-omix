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
                            <h2 class="content-header-title float-start mb-0">Complaint</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('complaint.index') }}">Complaint</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">View</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <a href="{{ route('complaint.index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i>&nbsp;</i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="column-search-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable">
                                    <table class="dt-column-search table table-responsive" id="Department">
                                        <thead>
                                            <tr>
                                                <th>Input</th>
                                                <th class="text-left">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Complaint Number</th>
                                                <th>{{ $result->complaint_no }}</th>
                                            </tr>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>{{ $result->user->first_name.' '.$result->user->last_name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <th>{{ $result->user->email_id }}</th>
                                            </tr>
                                            <tr>
                                                <th>Mobile Number</th>
                                                <th>{{ $result->user->mobile_no }}</th>
                                            </tr>
                                            <tr>
                                                <th>Landline Number</th>
                                                <th>{{ $result->user->landline_no }}</th>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <th>{{ $result->user->gender }}</th>
                                            </tr>
                                            <tr>
                                                <th>Date Of Birth</th>
                                                <th>{{ $result->user->dob }}</th>
                                            </tr>
                                            <tr>
                                                <th>Id Type</th>
                                                <th>{{ $result->user->id_type }}</th>
                                            </tr>
                                            <tr>
                                                <th>Id Number</th>
                                                <th>{{ $result->user->id_number }}</th>
                                            </tr>
                                            <tr>
                                                <th>Id Photo</th>
                                                <th><a href="{{ asset('storage/'.$result->user->id_photo) }}" target="_blank"><i data-feather='download'></i></a></th>
                                            </tr>
                                            @foreach($result->user->address as $addresskey => $addvalue)
                                                <tr>
                                                    <th>Address Line1</th>
                                                    <th>{{ $addvalue->address_line1 }}</th>
                                                </tr>
                                                <tr>
                                                    <th>Address Line2</th>
                                                    <th>{{ $addvalue->address_line2 }}</th>
                                                </tr>
                                                <tr>
                                                    <th>Address Line3</th>
                                                    <th>{{ $addvalue->address_line3 }}</th>
                                                </tr>
                                                <tr>
                                                    <th>State</th>
                                                    <th>{{ $addvalue->state->state_name }}</th>
                                                </tr>
                                                <tr>
                                                    <th>District</th>
                                                    <th>{{ $addvalue->district->district_name }}</th>
                                                </tr>
                                                <tr>
                                                    <th>Pincode</th>
                                                    <th>{{ $addvalue->pincode }}</th>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <th>{{ $addvalue->city->city_name }}</th>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th>Determination of Vigilance Angle</th>
                                                <th>{{ $result->determinationofvigilanceangle->name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Complaint Description</th>
                                                <th>{{ $result->complaint_description }}</th>
                                            </tr>
                                            <tr>
                                                <th>Remarks</th>
                                                <th>{{ $result->remarks }}</th>
                                            </tr>
                                            <tr>
                                                <th>Attachment Document</th>
                                                <th><a href="{{ asset('storage/'.$result->complaint_document) }}" target="_blank" class="d-flex align-items-center v_me"><i data-feather='eye' class="me-1"></i>View</a></th>
                                            </tr>
                                            <tr>
                                                <th>Complaint Date</th>
                                                <th>{{ date('d-m-Y H:i:s', strtotime($result->created_at)) }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Comment History</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-column-search table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Vigilance Name / Customer Name</th>
                                                <th>Complaint Status</th>
                                                <th>Comment</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result->complaint_status_history as $historykey => $historyvalue)
                                                <tr>
                                                    <th>{{ $historyvalue->user->first_name.' '.$historyvalue->user->last_name }}</th>
                                                    <th>
                                                        @switch($historyvalue->complaint_status)
                                                            @case(1)
                                                                Pending
                                                            @break
                                                            @case(2)
                                                                Under Processing
                                                            @break
                                                            @case(3)
                                                                Disposed
                                                            @break
                                                            @default
                                                        @endswitch
                                                    </th>
                                                    <th>{{ $historyvalue->comment }}</th>
                                                    <th>{{ date('d-m-Y H:i:s', strtotime($historyvalue->created_at)) }}</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    {!! Form::open(['method'=>'PUT','route'=>['complaint.update', $result->id], 'class'=>'form FormValidate', 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Complaint Status<span class="error">*</span></label>
                                                    {!! Form::select('complaint_status', complaint_status(), $result->complaint_status, ['class' => 'form-select']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Comment</label>
                                                    {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 5]) !!}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="{{ route('complaint.index') }}" class="btn btn-outline-secondary">Back</a>
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