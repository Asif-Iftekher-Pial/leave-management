@extends('master')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Form</h5>

      <!-- Multi Columns Form -->
      <form action="{{ route('employee.store') }}" method="POST"  class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" id="inputName5">
        </div>
        <div class="col-md-6">
          <label for="inputEmail5" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="inputEmail5">
        </div>
       
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Age</label>
          <input type="number" class="form-control" name="age" id="inputCity">
        </div>
        <div class="col-6">
          <label for="inputAddress5" class="form-label">Address</label>
          <input type="text" class="form-control" name="address" id="inputAddres5s" placeholder="1234 Main St">
        </div>

        <div class="col-md-6">
          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="inputPassword5">
        </div>
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