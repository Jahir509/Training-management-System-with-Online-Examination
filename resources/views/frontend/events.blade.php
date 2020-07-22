@extends('frontend.layout')

@section('title-section')
  <!-- page title -->
<section class="page-title-section overlay" data-background="{{asset('home/home/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Upcoming Events</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title --> 
@endsection

@section('content')
<!-- courses -->
<section class="section">
    <div class="container">
      <div class="row">
        @foreach ($events as $index=>$event)
          <!-- event -->
          <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card border-0 rounded-0 hover-shadow">
              <div class="card-img position-relative">
                <img class="card-img-top rounded-0" src="{{asset('media/events/'.$event->image)}}" alt="{{$event->image}}">
                <div class="card-date"><span>{{date('d',strtotime($event->date))}}</span><br>{{date('M',strtotime($event->date))}}</div>
              </div>
              <div class="card-body">
                <!-- location -->
                <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
                <a href="{{route('event.show',$event)}}">
                  <h4 class="card-title">{{$event->title}}</h4>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- /courses -->
@endsection