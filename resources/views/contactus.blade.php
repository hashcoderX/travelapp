@extends('layout.layout')

@section('content')

<div class="page">


  @include('layout.mainnavbar')


  <section class="section section-sm section-last bg-default text-left">
    <div class="container">
      <article class="title-classic">
        <div class="title-classic-title">
          <h3>Get in touch</h3>
        </div>
        <div class="title-classic-text">
          <p>If you have any questions, just fill in the contact form, and we will answer you shortly.</p>
        </div>
      </article>
      <div id="notification"></div>
      <form class="rd-form rd-form-variant-2 rd-mailform" data-form-type="contact">
        @csrf
        <div class="row row-14 gutters-14">
          <div class="col-md-4">
            <div class="form-wrap">
              <input class="form-input" id="name" type="text" name="name" data-constraints="@Required">
              <label class="form-label" for="contact-your-name-2">Your Name</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-wrap">
              <input class="form-input" id="email" type="email" name="email" data-constraints="@Email @Required">
              <label class="form-label" for="contact-email-2">E-mail</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-wrap">
              <input class="form-input" id="phone" type="text" name="phone" data-constraints="@Numeric">
              <label class="form-label" for="contact-phone-2">Phone</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-wrap">
              <label class="form-label" for="contact-message-2">Message</label>
              <textarea class="form-input textarea-lg" id="message" name="message" data-constraints="@Required"></textarea>
            </div>
          </div>
        </div>
        <button class="button button-primary button-pipaluk" type="button" onclick="saveinquary()">Send Message</button>
      </form>
    </div>
  </section>
  @endsection

  <script>
    function saveinquary() {
      var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var message = $('#message').val();

      $.ajax({
        url: "/contactrecord",
        method: "POST",
        data: {
          name: name,
          email: email,
          phone: phone,
          message: message,
          "_token": "{{ csrf_token() }}",
        },
        success: function(data) {
          $('#notification').html("");
          document.getElementById('notification').style.backgroundColor = "green";
          document.getElementById('notification').style.color = "white";
          $('#notification').text(data.message);

          setTimeout(function() {
            location.reload();
          }, 1000);
        }
      });
    }
  </script>