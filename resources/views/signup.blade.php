@extends('layout.layout')

@section('content')

<div class="page">
    @include('layout.secnavbar')

    <section class="section section-sm section-last bg-default text-left">
        <div class="container">
            <article class="title-classic">
                <div class="title-classic-title">
                    <h3>Sign Up</h3>
                </div>
                <div class="title-classic-text">
                    <!-- <p>If you have any questions, just fill in the contact form, and we will answer you shortly.</p> -->
                </div>
            </article>
            <form style="margin-top: 45px;" action="{{route('customerCreate')}}" method="POST">
                @csrf
                <div class="row row-14 gutters-14">
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-your-name-2" type="text" name="name" id="name" data-constraints="@Required">
                            <label class="form-label" for="contact-your-name-2">Full Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-email-2" type="email" name="email" id="email" data-constraints="@Email @Required">
                            <label class="form-label" for="contact-email-2">E-mail</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-phone-2" type="number" name="phone" id="phone" data-constraints="@Numeric">
                            <label class="form-label" for="contact-phone-2">Phone</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                           <textarea  cols="30" rows="10" class="form-input" id="address" name="address"  data-constraints="@Required"></textarea>
                            <label class="form-label" for="contact-phone-2">Address</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <input class="form-input" id="password" type="password" name="password" id="password">
                            <label class="form-label" for="contact-phone-2">Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <input class="form-input" id="repassword" type="password" name="password_confirmation" id="repassword">
                            <label class="form-label" for="contact-phone-2">Re-Password</label>
                        </div>
                    </div>


                </div>
                <button class="button button-primary button-pipaluk" type="submit" onclick="signup()">Sign Up</button>
        </div>
        </form>
    </section>
</div>

@endsection

<script>
    function signup() {

    }
</script>