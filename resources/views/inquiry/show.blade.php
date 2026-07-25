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
                            <h2 class="content-header-title float-start mb-0">Inquiry</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('inquiry.index') }}">Inquiry</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">View</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <a href="{{ route('inquiry.index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i>&nbsp;</i>Back</a>
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
                                    <table class="dt-column-search table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Input</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>{{ $inquiry->full_name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <th>{{ $inquiry->email }}</th>
                                            </tr>
                                            <tr>
                                                <th>Mobile Number</th>
                                                <th>{{ $inquiry->mobile_no }}</th>
                                            </tr>
                                            <tr>
                                                <th>Subject</th>
                                                <th>{{ $inquiry->subject }}</th>
                                            </tr>
                                            <tr>
                                                <th>Message</th>
                                                <th>{{ $inquiry->message }}</th>
                                            </tr>
                                            <tr>
                                                <th>Inquiry Date</th>
                                                <th>{{ date('d-m-Y H:i:s', strtotime($inquiry->created_at)) }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endsection