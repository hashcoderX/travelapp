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
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="/provincereg" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Province Name</label>
                                    <input type="text" class="form-control" id="province_name" name="province_name" placeholder="Province Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cover Image 550*500px</label>
                                    <input type="file" class="form-control" id="coverimage" name="coverimage" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea cols="30" rows="10" id="description" name="description" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Register</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Province Name</th>
                                    <th>Description</th>
                                </tr>
                                <tr>
                                    @foreach($provinces as $province)
                                <tr>
                                    <td>{{ $province -> state_name }}</td>
                                    <td>{{ $province -> description}}</td>
                                    <td><button class="btn btn-primary" id="{{ $province -> id }}" onclick="viewProvinceDetails(this.id)" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                        <button class="btn btn-danger" id="{{ $province -> id }}" onclick="deleterecord(this.id)">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Province Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="notification"></div>
                    <div class="modal-body">
                        <div class="forms-sample">

                            <div class="form-group" style="display: none;">
                                <label for="exampleInputUsername1">id</label>
                                <input type="text" class="form-control" id="proid" name="proid" placeholder="Province Name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Province Name</label>
                                <input type="text" class="form-control" id="province_namee" name="province_namee" placeholder="Province Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea cols="30" rows="10" id="descriptione" name="descriptione" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="savechangesbtn" onclick="edit()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function viewProvinceDetails(id) {
                $.ajax({
                    url: "/getPrivinceDetails",
                    method: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == 404) {
                            $('#displaymsg').html("");
                            $('#displaymsg').addClass("alert alert-danger");
                            $('#displaymsg').text(data.message);


                        } else {
                            $('#proid').val(data.state.id);
                            $('#province_namee').val(data.state.state_name);
                            $('#descriptione').val(data.state.description);
                        }
                    }
                });
            }

            function edit() {

                var provinceid = $('#proid').val();
                var provincename = $('#province_namee').val();
                var description = $('#descriptione').val();


                $.ajax({
                    url: "/editprovince",
                    method: "GET",
                    data: {
                        provinceid: provinceid,
                        provincename: provincename,
                        description: description,
                    },
                    success: function(data) {
                        $('#notification').html("");
                        $('#notification').addClass("alert alert-success");
                        document.getElementById('savechangesbtn').style.display = "none";
                        $('#notification').text(data.message);

                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    }
                });
            }

            function deleterecord(id) {
                $.ajax({
                    url: "/deleteProvince",
                    method: "GET",
                    data: {
                        provinceid: id,
                       
                    },
                    success: function(data) {
                       
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    }
                });
            }
        </script>


        @include('admin.layoutx.footer')