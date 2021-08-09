@extends('frontend.layout')
@section('title-section')
    <!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our Courses</a></li>
            <li class="list-inline-item text-white h3 font-secondary nasted">{{$course[0]['title']}}</li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
@endsection
@section('content')
<section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-4">
          <!-- course thumb -->
          <img src="{{asset('media/courses/'.$course[0]['image'])}}" class="img-fluid w-100">
        </div>
      </div>
      <!-- course info -->
      <div class="row align-items-center mb-5">
        <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
          <h2>{{$course[0]['category_name']}}</h2>
        </div>
        <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
          <ul class="list-inline text-xl-center">
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <i class="ti-book text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">COURSES</h6>
                  <p class="mb-0">06 Month</p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <i class="ti-alarm-clock text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">DURATION</h6>
                  <p class="mb-0">03 Hours</p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <i class="ti-wallet text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">FEE</h6>
                  <p class="mb-0">From: $699</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
          <a href="{{route('portal.exam-info',$course[0]['id'])}}" class="btn btn-primary">Apply now</a>
        </div>
        <!-- border -->
        <div class="col-12 mt-4 order-4">
          <div class="border-bottom border-primary"></div>
        </div>
      </div>
      <!-- course details -->
      <div class="row">
        <div class="col-12 mb-4">
          <h3>About Course</h3>
          <p>{{$course[0]['details']}}</p>
        </div>
       
        
        <!-- teacher -->
        
      </div>
    </div>
  </section>
  <!-- /section -->
@endsection