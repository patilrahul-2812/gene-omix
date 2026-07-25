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
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Service</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end text-end col-xl-3 col-md-12 col-sm-12 col-12 d-md-block ">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn btn-outline-danger delete_records"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            <a href="{{ route('service.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp;</i>Add</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Column Search -->
                <section id="column-search-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header border-bottom">
                                    <h4 class="card-title">Column Search</h4>
                                </div> -->
                                <div class="card-datatable">
                                    <table class="dt-column-search table table-responsive" id="Service">
                                        <thead>
                                            <tr>
                                                <th><input type='checkbox' class='form-check-input check_all'></th>
                                                <th>Sr. No</th>
                                                <th>Service Name</th>
                                                <th>Sort Order</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Column Search -->
            </div>
        </div>

        @include('elements.datatablesrc.datatable')
        <script>
            var table_id = $("#Service");
            var delete_url="{{ route('service.multiple_delete') }}";
            var status_url="{{ route('service.change_status') }}";

            /**
             * DataTables Advanced
             */

            $(function () {
                // var isRtl = $('html').attr('data-textdirection') === 'rtl';

                var dt_ajax_table = $('.datatables-ajax'),
                    dt_filter_table = $('.dt-column-search'),
                    dt_adv_filter_table = $('.dt-advanced-search'),
                    dt_responsive_table = $('.dt-responsive');

                if (dt_filter_table.length) {
                    // Setup - add a text input to each footer cell
                    $('.dt-column-search thead tr').clone(true).appendTo('.dt-column-search thead');

                    $('.dt-column-search thead tr:eq(1) th').each(function (i) {
                        var title = $(this).text();
                        $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

                        $('input', this).on('keyup change', function () {
                            if (dt_filter.column(i).search() !== this.value) {
                                dt_filter.column(i).search(this.value).draw();
                            }
                        });
                    });

                    var dt_filter = dt_filter_table.DataTable({
                        ajax: "{{ route('service.index') }}",
                        columns: [
                            { data: 'checkbox',orderable:false },
                            { data: 'srno',orderable:true },
                            { data: 'service_name',orderable:true },
                            { data: 'sort_order',orderable:false },
                            { data: 'status',orderable:false },
                            { data: 'action',orderable:false },
                        ],
                        "order": [[1, 'desc']],

                        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        orderCellsTop: true,
                        language: {
                            paginate: {
                                // remove previous & next text from pagination
                                previous: '&nbsp;',
                                next: '&nbsp;'
                            }
                        }
                    });
                }

                // on key up from input field
                $('input.dt-input').on('keyup', function () {
                    filterColumn($(this).attr('data-column'), $(this).val());
                });

                // Filter form control to default size for all tables
                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');
            });
        </script>
    @endsection