@extends('layout.layout')

@section('content')

<div class="page">


    @include('layout.mainnavbar')

    <!-- Discover New Horizons-->
    <!-- Section Subscribe-->
    <section class="section bg-default text-center offset-top-50">
        <div class="parallax-container" data-parallax-img="{{asset('/theam/images/slider1.jpg')}}">
            <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
                <div class="container">
                    <h2 class="heading-2 oh font-weight-normal wow slideInDown"><span class="d-block font-weight-semi-bold">Thanks Your Order</span><span class="d-block font-weight-light">We will contact you soon!!</span></h2>
                    <p class="text-width-medium text-spacing-75 wow fadeInLeft" data-wow-delay=".1s">Our agency offers travelers various tours and excursions with destinations all over the world. Browse our website to find your dream tour!</p><a class="button button-secondary button-pipaluk" href="#">Book a Tour Now</a>
                </div>
            </div>
        </div>
    </section>

    @endsection