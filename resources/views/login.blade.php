@extends('layout.layout')

@section('content')

<div class="page">
    @include('layout.secnavbar')

    <section class="section section-sm section-last bg-default text-left">
        <div class="container">
            <article class="title-classic">
                <div class="title-classic-title">
                    <h3>Log In</h3>
                </div>
                <div class="title-classic-text">
                    <!-- <p>If you have any questions, just fill in the contact form, and we will answer you shortly.</p> -->
                </div>
            </article>
            <form style="margin-top: 45px;" action="{{route('loginclient')}}" method="POST">  
                <div class="row row-14 gutters-14">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-email-2" type="email" name="email" id="email" data-constraints="@Email @Required">
                            <label class="form-label" for="contact-email-2">E-mail</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-phone-2" type="password" name="password" id="password">
                            <label class="form-label" for="contact-phone-2">Password</label>
                        </div>
                    </div>

                </div>
                <button class="button button-primary button-pipaluk" type="submit">Log In</button>
            </form>
        </div>
    </section>
</div>

@endsection

<script>
    function signup() {

    }
</script>