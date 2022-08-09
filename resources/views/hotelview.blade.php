@extends('layout.layout')

@section('content')

<div class="page">


    @include('layout.mainnavbar')

    <!-- Discover New Horizons-->
    <section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
            <div class="row row-50 align-items-center justify-content-center justify-content-xl-between">

                <div class="col-lg-6 text-center wow fadeInUp"><img src="{{asset('/hotelimages/'.$hotel->img_cover_url)}}" alt="" width="556" height="382" />
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".1s">
                    <div class="box-width-lg-470">
                        <h3>{{ $hotel-> hotelname}}</h3>
                        <!-- Bootstrap tabs-->
                        <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-7">
                            <!-- Nav tabs-->
                            <ul class="nav nav-tabs">
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-7-1" data-toggle="tab">About us</a></li>

                            </ul>
                            <!-- Tab panes-->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs-7-1">
                                    <p>Wonder Tour is committed to bringing our clients the best in value and quality travel arrangements. We are passionate about travel and sharing the world's wonders with you.</p>


                                </div>
                            </div>

                            <form style="margin-top: 45px;" action="/addbooking" method="POST">
                                <div class="row row-14 gutters-14">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <input class="form-input" id="contact-email-2" type="text" name="userid" id="userid" value="{{ Auth::user()->id }}" data-constraints="@Required">
                                            <label class="form-label" for="contact-email-2">User Id</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <input class="form-input" id="contact-email-2" type="text" name="hotelid" id="hotelid" value="{{ $hotel-> id }}" data-constraints="@Required">
                                            <label class="form-label" for="contact-email-2">Hotel Id</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label>Check In Date</label>
                                            <input class="form-input" id="contact-email-2" type="date" name="checkindate">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label>Check Out Date</label>
                                            <input class="form-input" id="contact-email-2" type="date" name="checkoutdate">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <!-- <input class="form-input" id="contact-email-2" type="text" name="adultc" id="adultc" data-constraints="@Required"> -->
                                            <label for="contact-email-2">Adult Count</label>
                                            <select class="form-input" id="adultc" type="text" name="adultc">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <!-- <input class="form-input" id="contact-email-2" type="text" name="adultc" id="adultc" data-constraints="@Required"> -->
                                            <label for="contact-email-2">Child Count</label>
                                            <select class="form-input" id="childc" type="text" name="childc">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <div class="group-md group-middle">
                                                <button type="submit" class="button button-secondary button-pipaluk">Order</button>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <section class="section section-sm section-fluid bg-default">

        <!-- Owl Carousel-->
        <div class="owl-carousel owl-classic owl-timeline" data-items="1" data-md-items="2" data-lg-items="3" data-xl-items="4" data-margin="30" data-autoplay="false" data-nav="true" data-dots="true">
            <div class="owl-item">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="{{asset('/hotelimages/'.$hotel->img_one_url)}}" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="i{{asset('/hotelimages/'.$hotel->img_one_url)}}" data-lightgallery="item"><img src="{{asset('/hotelimages/'.$hotel->img_one_url)}}" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <!-- <h5 class="thumbnail-mary-project"><a href="#">France</a></h5><span class="thumbnail-mary-decor"></span> -->
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>
            <div class="owl-item">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="{{asset('/hotelimages/'.$hotel->img_two_url)}}" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-image-12-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-12-420x308.jpg" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <!-- <h5 class="thumbnail-mary-project"><a href="#">Italy</a></h5><span class="thumbnail-mary-decor"></span> -->
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>
            <div class="owl-item">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="{{asset('/hotelimages/'.$hotel->img_three_url)}}" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-image-13-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-13-420x308.jpg" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <!-- <h5 class="thumbnail-mary-project"><a href="#">Egypt</a></h5><span class="thumbnail-mary-decor"></span> -->
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>
            <div class="owl-item">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="{{asset('/hotelimages/'.$hotel->img_four_url)}}" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-image-14-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-14-420x308.jpg" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <!-- <h5 class="thumbnail-mary-project"><a href="#">Dubai</a></h5><span class="thumbnail-mary-decor"></span> -->
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>

        </div>
    </section>

    @endsection