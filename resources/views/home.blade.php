@extends('layout.layout')

@section('content')

<div class="page">


    @include('layout.mainnavbar')

    @include('layout.slider')


    <!-- Swiper-->
    <section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
            <div class="box-categories cta-box-wrap">
                <div class="box-categories-content">
                    <div class="row justify-content-center">

                        
                        @foreach($provinces as $province)
                        <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                            <ul class="list-marked-2 box-categories-list">
                                <li>
                                    <a href="/hotellistpr/{{ $province->id }}"><img src="{{asset('/state_image/'.$province->state_image)}}" alt="" width="368" height="420" /></a>
                                    <h5 class="box-categories-title">{{ $province->state_name }}</h5>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
            </div><a class="link-classic wow fadeInUp" href="#">Other Tours<span></span></a>
            <!-- Owl Carousel-->
        </div>

     
    </section>

    @endsection