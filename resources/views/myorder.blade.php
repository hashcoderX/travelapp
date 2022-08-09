@extends('layout.layout')

@section('content')

<div class="page">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @include('layout.mainnavbar')

    <!-- Discover New Horizons-->
    <!-- Section Subscribe-->
    <section class="section bg-default text-center offset-top-50">
        <div class="container">
        <h1>My Order</h1>
            <table class="table table-responcive">
                <tr>
                    <th>Order Id</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th></th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order -> id }}</td>
                    <td>{{ $order -> checkindate}}</td>
                    <td>{{ $order -> checkoutdate}}</td>
                    @if( $order -> status =='1')
                    <td><button class="btn btn-outline-success">Confirmed</button></td>

                    @else
                    <td><button class="btn btn-outline-warning">Pending</button></td>

                    @endif
                </tr>
                @endforeach

            </table>
        </div>
    </section>

    @endsection