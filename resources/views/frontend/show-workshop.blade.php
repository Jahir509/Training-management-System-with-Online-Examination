@extends('frontend.layout')
@section('content')
<section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">workshop Details</a></li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- workshop single -->
  <section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="section-title">{{$workshop->title}}</h2>
        </div>
        <!-- workshop image -->
        <div class="col-12 mb-4">
          <img src="{{asset('media/workshops/'.$workshop->image)}}" alt="workshop thumb" class="img-fluid w-100">
        </div>
      </div>
      <!-- workshop info -->
      <div class="row align-items-center mb-5">
        <div class="col-lg-9">
          <ul class="list-inline">
            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
              <div class="d-flex align-items-center">
                <i class="ti-location-pin text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">LOCATION</h6>
                  <p class="mb-0">{{$workshop->place}}</p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
              <div class="d-flex align-items-center">
                <i class="ti-calendar text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">DATE</h6>
                  <p class="mb-0">{{date('d-M-Y',strtotime($workshop->date))}}</p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
              <div class="d-flex align-items-center">
                <i class="ti-time text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">TIME</h6>
                  <p class="mb-0">{{$workshop->time}}</p>
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
      <!-- workshop details -->
      <div class="row">
        <div class="col-12 mb-50">
          <h3>About workshop</h3>
          <p>{{$workshop->details}}</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /workshop single -->
@endsection