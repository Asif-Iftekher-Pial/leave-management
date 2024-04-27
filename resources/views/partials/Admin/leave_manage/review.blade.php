@extends('master')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Leave Review - {{ $review->user->name }}</h5>
      @include('layouts.errorAndSuccessMessage')
      <!-- Multi Columns Form -->
      <form action="{{ route('leave-request-manage.update',$review->id) }}" method="POST"  class="row g-3" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-md-6">
          <label for="inputState" class="form-label">Status</label>
          <select name="leave_status" class="form-select">
            <option selected="">Choose...</option>
            <option value="pending">Pending</option>
            <option value="approved">Approve</option>
            <option value="rejected">Reject</option>
          </select>
        </div>
       
        <div class="col-6">
          <label for="inputAddress5" class="form-label">Admin Comment</label>
          <textarea class="form-control" name="admin_comment" id="inputAddres5s" placeholder="leave a comment"></textarea>
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
@endsection