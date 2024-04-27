@extends('master')
@section('content')
  <div class="row">
      @if (auth()->user()->role == 'admin')
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-success info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-warning info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::where('leave_status', 'pending')->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-primary info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Approved Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::where('leave_status', 'approved')->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-danger info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Rejected Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::where('leave_status', 'rejected')->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endif
      @if (auth()->user()->role == 'employee')
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-success info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">My Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::where('user_id',auth()->user()->id)->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-warning info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">My Pending Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::where(['user_id'=>auth()->user()->id,'leave_status'=>'pending'])->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-primary info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">My Approved Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::where(['user_id'=>auth()->user()->id,'leave_status'=> 'approved'])->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card bg-danger info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">My Rejected Leave Requests <span></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>{{ App\Models\LeaveRequest::where(['user_id'=>auth()->user()->id,'leave_status'=>'rejected'])->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endif
  </div>
@endsection
