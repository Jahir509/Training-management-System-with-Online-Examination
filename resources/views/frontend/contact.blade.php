@extends('frontend.layout')

@section('title-section')
   <!-- page title -->
<section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Contact Us</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten">Do you have other questions? Don't worry, there aren't any dumb questions. Just fill out the form below and we'll get back to you as soon as possible.</p>
        </div>
      </div>
    </div>
</section>
  <!-- /page title -->
@endsection

@section('content')
<!-- contact -->
<section class="section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-title">Contact Us</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7 mb-4 mb-lg-0">
          <form action="#">
            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name">
            <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email">
            <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
            <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message"></textarea>
            <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
          </form>
        </div>
        <div class="col-lg-5">
          <p class="mb-5">Every Year 20% students get 25%-100% tuition fee waiver based on previous results and trimester results. Zodiac provides about 10 to 12 crore taka as scholarship in every year, one of the highest amongst the private sector. If you are a committed student, take the challenge and build your future with Zodiac.</p>
          <p class="mb-5">United City, Madani Avenue,  Badda, Dhaka 1212, Bangladesh.</p>
          <a href="tel:+8809604848848" class="text-color h5 d-block">Phone: +88 09604-848-848</a>
          <a href="mailto:info@zodiac.ac.bd" class="mb-5 text-color h5 d-block">zodiac@uiu.ac.bd</a>
        </div>
      </div>
    </div>
  </section>
  <!-- /contact -->
  
  <!-- gmap -->
  <section class="section pt-0">
    <!-- Google Map -->
    <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
  </section>
  <!-- /gmap -->
@endsection