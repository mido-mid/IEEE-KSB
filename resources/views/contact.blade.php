
@extends('layouts.user_layout')


@section('content')

<main>
    <section class="section-form d-flex justify-content-center">
      <form class="contact-us" method="POST" id="contact-form" action="{{route('contactpost')}}" autocomplete="off">
      @csrf
        <h1 class="heading-primary text-center">contact us</h1>
        <p class="text-uppercase text-center form-para">we'd love to hear from you!</p>

        <p id="error" role="alert" class="alert alert-danger" style="font-size:16px;font-family:'lato';padding: 8px 15px;display:none;margin-top:10px">
                                        
              please enter your name , email , subject and message correctly
        </p>
        <p id="message" role="alert" class="alert alert-success" style="font-size:16px;font-family:'lato';padding: 8px 15px;display:none;margin-top:10px"></p>        
        <div class="form-box">
          <input name="name" type="text" placeholder=" " class="input" required>
          <label class="label">Name <span style="color:red;">*</span> </label>
        </div>
        <div class="form-box">
          <input placeholder=" " name="email" type="email" class="input" required>
          <label class="label">Email Address <span style="color:red;">*</span></label>
        </div>
        <div class="form-box">
          <input placeholder=" " type="text" name="subject" class="input" required>
          <label class="label">Subject <span style="color:red;">*</span></label>
        </div>
        <div class="form-box">
          <textarea name="message" placeholder=" " class="input" required></textarea>
          <label class="label">Leave a comment <span style="color:red;">*</span></label>
        </div>
        <div class="d-flex justify-content-center">
          <button class="button send-button">Send</button>
        </div>
      </form>
    </section>
  </main>

@endsection