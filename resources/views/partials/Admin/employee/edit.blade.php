@extends('master')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Edit Form</h5>

      <!-- Multi Columns Form -->
      <form action="{{ route('employee.update',$employee->id) }}" method="POST"  class="row g-3" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Name</label>
          <input type="text" class="form-control" value="{{ $employee->user->name }}" name="name" id="inputName5">
        </div>
       
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Age</label>
          <input type="number" class="form-control" value="{{ $employee->age }}" name="age" id="inputCity">
        </div>
        <div class="col-6">
          <label for="inputAddress5" class="form-label">Address</label>
          <input type="text" class="form-control" name="address"  value="{{ $employee->address }}"  id="inputAddres5s" placeholder="1234 Main St">
        </div>
        {{--         
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select id="inputState" class="form-select">
            <option selected="">Choose...</option>
            <option>...</option>
          </select>
        </div> --}}
        
        <div class="col-md-6">
          <label for="inputZip" class="form-label">Photo</label>
          <input type="file" class="form-control" name="photo" id="inputZip">
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
@endsection