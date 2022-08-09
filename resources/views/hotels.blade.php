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
                            <form class="forms-sample" method="POST" action="/registerhotel" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Hotel Name</label>
                                    <input type="text" class="form-control" id="hotelname" name="hotelname" placeholder="Hotel Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Province Select</label>
                                    <select class="form-control" id="province_name" name="province_name">
                                        @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Cover Photo</label>
                                    <input type="file" class="form-control" id="coverimage" name="coverimage" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo One</label>
                                            <input type="file" class="form-control" id="photoone" name="photoone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo Two</label>
                                            <input type="file" class="form-control" id="phototwo" name="phototwo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo Three</label>
                                            <input type="file" class="form-control" id="photothree" name="photothree" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo four</label>
                                            <input type="file" class="form-control" id="photofour" name="photofour" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea cols="30" rows="10" id="description" name="description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Telephone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <textarea cols="30" rows="10" id="address" name="address" class="form-control"></textarea>
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
                                    <th>Hotel Name</th>
                                    <th>Telephone Number</th>
                                    <th>Address</th>
                                </tr>
                                <tr>
                                    @foreach($hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel -> hotelname }}</td>
                                    <td>{{ $hotel -> telephone_number}}</td>
                                    <td>{{ $hotel -> address}}</td>
                                    <td><button class="btn btn-primary" id="{{ $hotel -> id }}" onclick="loadDetails(this.id)" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Hotel Details Modification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="notification"></div>
                        <div class="forms-sample">
                            <div class="form-group" style="display: none;">
                                <label for="exampleInputUsername1">Hotel Id</label>
                                <input type="text" class="form-control" id="hotelid" name="hotelid" placeholder="Hotel Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Hotel Name</label>
                                <input type="text" class="form-control" id="hotelnamee" name="hotelnamee" placeholder="Hotel Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Province Select</label>
                                <select class="form-control" id="province_namee" name="province_namee">
                                    @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->state_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea cols="30" rows="10" id="descriptione" name="descriptione" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Telephone</label>
                                <input type="text" class="form-control" id="telephonee" name="telephonee" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <textarea cols="30" rows="10" id="addresse" name="addresse" class="form-control"></textarea>
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
            function loadDetails(id) {
                $.ajax({
                    url: "/hethotelDetails",
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
                            $('#hotelid').val(data.hotel.id);
                            $('#hotelnamee').val(data.hotel.hotelname);
                            $('#descriptione').val(data.hotel.description);
                            $('#telephonee').val(data.hotel.telephone_number);
                            $('#addresse').val(data.hotel.address);
                        }
                    }
                });
            }

            function edit() {

                var hotelid = $('#hotelid').val();
                var hotelname = $('#hotelnamee').val();
                var description = $('#descriptione').val();
                var telephone = $('#telephonee').val();
                var address = $('#addresse').val();

                $.ajax({
                    url: "/edithotel",
                    method: "GET",
                    data: {
                        hotelid: hotelid,
                        hotelname: hotelname,
                        description: description,
                        telephone: telephone,
                        address: address,
                    },
                    success: function(data) {
                        $('#notification').html("");
                        $('#notification').addClass("alert alert-success");
                        document.getElementById('savechangesbtn').style.display = "none";
                        $('#notification').text(data.message);
                    }
                });
            }
        </script>

        @include('admin.layoutx.footer')