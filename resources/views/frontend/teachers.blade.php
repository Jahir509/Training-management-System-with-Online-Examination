@extends('frontend.layout')

@section('title-section')
    <!-- page title -->
    <section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
        <div class="container">
        <div class="row">
            <div class="col-md-8">
            <ul class="list-inline custom-breadcrumb">
                <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our Teachers</a></li>
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
          <h2 class="section-title">Our Teachers</h2>
        </div>
        <!-- teacher -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher-1.jpg')}}" alt="teacher">
            <div class="card-body">
              <a href="teacher-single.html">
                <h4 class="card-title">Jacke Masito</h4>
              </a>
              <p>Teacher</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- teacher -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher-2.jpg')}}" alt="teacher">
            <div class="card-body">
              <a href="teacher-single.html">
                <h4 class="card-title">Clark Malik</h4>
              </a>
              <p>Teacher</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- teacher -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher-3.jpg')}}" alt="teacher">
            <div class="card-body">
              <a href="teacher-single.html">
                <h4 class="card-title">John Doe</h4>
              </a>
              <p>Teacher</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /teachers -->
@endsection