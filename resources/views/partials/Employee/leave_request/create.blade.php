@extends('master')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Leave Form</h5>
      @include('layouts.errorAndSuccessMessage')
      <!-- Multi Columns Form -->
      <form action="{{ route('employee-leave-request.store') }}" method="POST"  class="row g-3" enctype="multipart/form-data">
        @csrf
              
        <div class="col-md-6">
          <label for="inputState"  class="form-label">Leave Type</label>
          <select name="leave_type"  class="form-select">
            <option selected="">Choose...</option>
            <option value="casual">Casual Leave</option>
            <option value="sick">Sick Leave</option>
            <option value="emergency">Emargency Leave</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Start Date</label>
          <input type="date" class="form-control" name="start_date">
        </div>
        <div class="col-md-6">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date">
        </div>
       
        <div class="col-6">
          <label for="inputAddress5" class="form-label">Reason</label>
          <textarea type="text" class="form-control" name="reason" id="inputAddres5s" placeholder="Leave Reason"></textarea>
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
@endsection