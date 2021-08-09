@extends('frontend.layout')

@section('title-section')
    <!-- page title -->
    <section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
        <div class="container">
        <div class="row">
            <div class="col-md-8">
            <ul class="list-inline custom-breadcrumb">
                <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our Instructors</a></li>
                <li class="list-inline-item text-white h3 font-secondary "></li>
            </ul>
            <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
            </div>
        </div>
        </div>
    </section>
    <!-- /page title -->    
@endsection

@section('content')
<!-- teachers -->
<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="section-title">Our Instructors</h2>
        </div>
        @foreach ($instuctors as $instuctor)
        <!-- teacher -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
            <div class="card border-0 rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="{{asset('media/teachers/'.$instuctor->image)}}" alt="teacher" >
              <div class="card-body">
                <a href="teacher-single.html">
                  <h4 class="card-title">{{$instuctor->name}}</h4>
                </a>
                <p>Teacher</p>
                <p>{{$instuctor->field}}</p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- /teachers -->
@endsection