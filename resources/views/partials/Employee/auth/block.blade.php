@extends('master')
@section('content')
<div class="container">

    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <h5>Your Account has been blocked</h5>
      <h2>Contact Admin</h2>
      <a class="btn" href="#">Back to home</a>
      <img src="{{ asset('assets/img/not-found.svg') }}" class="img-fluid py-5" alt="Page Not Found">
    
    </section>

  </div>
@endsection