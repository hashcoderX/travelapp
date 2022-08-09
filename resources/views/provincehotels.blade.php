@extends('layout.layout')

@section('content')

<div class="page">


    @include('layout.mainnavbar')

    <section class="section section-sm bg-default">
        <div class="container">
            <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Province Hotel</span></h3>
            <div class="row row-sm row-40 row-md-50">

                @foreach($hotels as $hotel)
                <div class="col-sm-6 col-md-12 wow fadeInRight">
                    <!-- Product Big-->
                    <article class="product-big">
                        <div class="unit flex-column flex-md-row align-items-md-stretch">
                            <div class="unit-left">
                                <a class="product-big-figure" href="#"><img src="{{asset('/hotelimages/'.$hotel->img_cover_url)}}" alt="" width="600" height="366" /></a>
                            </div>
                            <div class="unit-body">
                                <div class="product-big-body">
                                    <h5 class="product-big-title"><a href="#">{{ $hotel-> hotelname}}</a></h5>
                                    <div class="group-sm group-middle justify-content-start">
                                        <div class="product-big-rating"><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star_half"></span></div>
                                        <a class="product-big-reviews" href="#">4 customer reviews</a>
                                    </div>
                                    <p class="product-big-text">{{ $hotel->description  }}</p><a class="button button-black-outline button-ujarak" href="/hotelview/{{ $hotel->id }}">Preview</a>
                                    <div class="product-big-price-wrap"><span class="product-big-price"></span></div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @endsection