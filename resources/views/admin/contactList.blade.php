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
                            <table class="table">
                                <tr>
                                    <th>No#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                </tr>
                                <tr>
                                    @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact -> id }}</td>
                                    <td>{{ $contact -> name }}</td>
                                    <td>{{ $contact -> email }}</td>
                                    <td>{{ $contact -> phone}}</td>
                                    <td>{{ $contact -> message}}</td>
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