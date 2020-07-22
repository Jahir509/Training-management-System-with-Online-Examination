@extends('frontend.layout')
@section('content')
<section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Event Details</a></li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- event single -->
  <section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="section-title">{{$event->title}}</h2>
        </div>
        <!-- event image -->
        <div class="col-12 mb-4">
          <img src="{{asset('media/events/'.$event->image)}}" alt="event thumb" class="img-fluid w-100">
        </div>
      </div>
      <!-- event info -->
      <div class="row align-items-center mb-5">
        <div class="col-lg-9">
          <ul class="list-inline">
            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
              <div class="d-flex align-items-center">
                <i class="ti-location-pin text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">LOCATION</h6>
                  <p class="mb-0">{{$event->place}}</p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
              <div class="d-flex align-items-center">
                <i class="ti-calendar text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">DATE</h6>
                  <p class="mb-0">{{date('d-M-Y',strtotime($event->date))}}</p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
              <div class="d-flex align-items-center">
                <i class="ti-time text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">TIME</h6>
                  <p class="mb-0">{{$event->time}}</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        {{-- <div class="col-lg-3 text-lg-right text-left">
          <a href="#" class="btn btn-primary">Apply now</a>
        </div> --}}
        <!-- border -->
        <div class="col-12 mt-4 order-4">
          <div class="border-bottom border-primary"></div>
        </div>
      </div>
      <!-- event details -->
      <div class="row">
        <div class="col-12 mb-50">
          <h3>About Event</h3>
          <p>{{$event->details}}</p>
        </div>
      </div>
      <!-- event speakers -->
      <div class="row">
        <div class="col-12">
          <h3 class="mb-4">Event Speakers</h3>
        </div>
        <!-- speakers -->
        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
          <div class="media">
            <img class="mr-3 img-fluid" src="{{asset('home/images/event-speakers/speaker-1.jpg')}}" alt="speaker">
            <div class="media-body">
              <h4 class="mt-0">Jack Mastio</h4>
              Teacher
            </div>
          </div>
        </div>
        <!-- speakers -->
        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
          <div class="media">
            <img class="mr-3 img-fluid" src="{{asset('home/images/event-speakers/speaker-2.jpg')}}" alt="speaker">
            <div class="media-body">
              <h4 class="mt-0">John Doe</h4>
              Teacher
            </div>
          </div>
        </div>
        <!-- speakers -->
        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
          <div class="media">
            <img class="mr-3 img-fluid" src="{{asset('home/images/event-speakers/speaker-3.jpg')}}" alt="speaker">
            <div class="media-body">
              <h4 class="mt-0">Randy Luis</h4>
              Teacher
            </div>
          </div>
        </div>
        <!-- speakers -->
        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
          <div class="media">
            <img class="mr-3 img-fluid" src="{{asset('home/images/event-speakers/speaker-4.jpg')}}" alt="speaker">
            <div class="media-body">
              <h4 class="mt-0">Alfred Jin</h4>
              Teacher
            </div>
          </div>
        </div>
        <!-- border -->
        <div class="col-12 mt-4 order-4">
          <div class="border-bottom border-primary"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- /event single -->
@endsection