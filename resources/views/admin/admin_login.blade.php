@extends('admin.layoutx.app')

@section('content')

@include('admin.layoutx.loginnav')

<div class="container-fluid page-body-wrapper">
  <!-- partial:../../partials/_settings-panel.html -->


  <!-- partial -->
  <!-- partial:../../partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="../../index.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Login</span>
        </a>
      </li>

  </nav>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Admin Dashboard Login</h4>

              <form class="forms-sample" action="/adminlogin" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail3">Email address</label>
                  <input type="email" class="form-control" id="email" name="emailx" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Password</label>
                  <input type="password" class="form-control" id="password" name="passwordx" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary me-2">Login</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>








      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->



    @include('admin.layoutx.footer')