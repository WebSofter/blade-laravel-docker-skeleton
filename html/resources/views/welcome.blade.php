@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- Navbar Start -->
@include('partials.nav')        
<!-- Navbar End -->

<!-- Sidebar Start -->
@include('partials.sidebar')  
<!-- Sidebar End -->

<!-- Main Content Start -->
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 fw-bold fs-3">Dashboard</div>
    </div>
    <div class="row mt-2">
      <div class="col-md-3 mb-3">
        <div class="card text-white bg-primary h-100">
          <div class="card-header fw-bold">Header</div>
          <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card text-white bg-success h-100">
          <div class="card-header fw-bold">Header</div>
          <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card text-white bg-warning h-100">
          <div class="card-header fw-bold">Header</div>
          <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card text-white bg-danger h-100">
          <div class="card-header fw-bold">Header</div>
          <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-md-6">
        <div class="card-chart">
          <div class="card-header">Charts</div>
          <div class="card-body">
            <canvas class="chart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-chart">
          <div class="card-header">Charts</div>
          <div class="card-body">
            <canvas class="chart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>
</main>
<!-- Main Content End -->
@endsection