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
                                    <th>Order No</th>
                                    <th>Check In Date</th>
                                    <th>Check Out Date</th>
                                    <th>Adults Count</th>
                                    <th>Child Count</th>
                                </tr>

                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->checkindate }}</td>
                                    <td>{{ $order->checkoutdate }}</td>
                                    <td>{{ $order->adult_c }}</td>
                                    <td>{{ $order->child_c }}</td>
                                    <td><button class="btn btn-primary" id="{{ $order->id }}" data-bs-toggle="modal" onclick="viewOrder(this.id)" data-bs-target="#exampleModal">Preview</button></td>
                                </tr>
                                @endforeach

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
                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="notification"></div>
                    <div class="modal-body">
                        <div class="forms-sample">

                            <div class="form-group" style="display: none;">
                                <label for="exampleInputUsername1">id</label>
                                <input type="text" class="form-control" id="orderid" name="orderid">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Hotel Name</label>
                                <input type="text" class="form-control" id="hotelname" name="hotelname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Customer Name</label>
                                <input type="text" class="form-control" id="customername" name="customername">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Check In Date</label>
                                <input type="text" class="form-control" id="checkindate" name="checkindate">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Check Out Date</label>
                                <input type="text" class="form-control" id="checkoutdate" name="checkoutdate">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Adults</label>
                                <input type="text" class="form-control" id="adults" name="adults">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Childs</label>
                                <input type="text" class="form-control" id="childs" name="childs">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="savechangesbtn" onclick="confirmOrder()">Confirm Order</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function viewOrder(id) {
                $.ajax({
                    url: "/getOrderDetails",
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
                            $('#orderid').val(data.order.id);
                            $('#hotelname').val(data.hotel.hotelname);
                            $('#customername').val(data.customer.fullname);
                            $('#checkindate').val(data.order.checkindate);
                            $('#checkoutdate').val(data.order.checkoutdate);
                            $('#adults').val(data.order.adult_c);
                            $('#childs').val(data.order.child_c);
                        }
                    }
                });
            }

            function confirmOrder() {

                var orderid = $('#orderid').val();

                $.ajax({
                    url: "/confirmorder",
                    method: "GET",
                    data: {
                        orderid: orderid,
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