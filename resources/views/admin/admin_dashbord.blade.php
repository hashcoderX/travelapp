@extends('admin.layoutx.app')

@section('content')

@include('admin.layoutx.navbar')

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_settings-panel.html -->

  <!-- partial -->
  <!-- partial:partials/_sidebar.html -->


  @include('admin.layoutx.sidenavbar')

  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Province Register</h4>
              <a href="/provinceregister" type="submit" class="btn btn-primary me-2">Open Window</a>
              
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Hotel Register</h4>
              <a href="/hotels" type="submit" class="btn btn-primary me-2">Open Window</a>
              
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Contacts</h4>
              <a href="/contacts" type="submit" class="btn btn-primary me-2">Open Window</a>
              
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Booking List</h4>
              <a href="/bookinglist" type="submit" class="btn btn-primary me-2">Open Window</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->

    @include('admin.layoutx.footer')