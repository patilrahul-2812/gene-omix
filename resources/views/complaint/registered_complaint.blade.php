    @extends('layouts.front_child_layout')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-12 col-xxl-12">
                    @if(!$complaint_list->isEmpty())
                        <div class="py-5 px-5">
                            <h5 class="mb-4 title text-center">Registered Complaints</h5>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="accordion custom-accordion" id="accordionExample">
                                        @foreach($complaint_list as $clkey => $clvalue)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $clkey+1 }}">
                                                    <button class="accordion-button @if(!$clkey == 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $clkey+1 }}" aria-expanded="true" aria-controls="collapse{{ $clkey+1 }}">
                                                        {!! $clvalue->complaint_description !!}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $clkey+1 }}" class="accordion-collapse collapse @if($clkey == 0) show @endif" aria-labelledby="heading{{ $clkey+1 }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <ul class="complaint-list">
                                                            <li class="compeleted mb-4">
                                                                <!-- <h5 class="h6">Complaint Registration No.: <span class="text-uppercase">CVO-XXXX987</span></h5> -->
                                                                <p>{{ date('d-F-Y', strtotime($clvalue->created_at)) }}</p>
                                                                <h6>Complaint Registered</h6>
                                                            </li>
                                                            @foreach($clvalue->complaint_status_history as $cshkey => $cshvalue)
                                                                @if($cshvalue->complaint_status == 1)
                                                                    <li class="compeleted mb-4">
                                                                        <p>{{ date('d-F-Y', strtotime($cshvalue->created_at)) }}</p>
                                                                        <span class="status-label px-3 bg-danger pending">Pending</span>
                                                                        <span class="remark"><p>{{ $cshvalue->comment }}</p></span>
                                                                    </li>
                                                                @elseif($cshvalue->complaint_status == 2)
                                                                    <li class="compeleted mb-4">
                                                                        <p>{{ date('d-F-Y', strtotime($cshvalue->created_at)) }}</p>
                                                                        <span class="status-label px-3 bg-warning processing">Under Processing</span>
                                                                        <span class="remark"><p>{{ $cshvalue->comment }}</p></span>
                                                                    </li>
                                                                @elseif($cshvalue->complaint_status == 3)
                                                                    <li class="completed mb-4">
                                                                        <p>{{ date('d-F-Y', strtotime($cshvalue->created_at)) }}</p>
                                                                        <span class="status-label px-3 bg-success disposed">Disposed</span>
                                                                        <span class="remark"><p>{{ $cshvalue->comment }}</p></span>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    @endsection