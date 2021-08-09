@extends('frontend.layout')

@section('title-section')
   <!-- page title -->
<section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">About Us</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten">Zodiac provides high configured lab facilities, highly qualified instructors and industry driven environment. Zodiac also ensures job placement of successful candidates.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
@endsection

@section('content')
<!-- about -->
<section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="img-fluid w-100 mb-4" src="{{asset('home/images/about/about-page.jpg')}}" alt="about image">
          <h2 class="section-title">ABOUT OUR JOURNY</h2>
          <p>The goal to prepare or develop the students properly for fitting themselves in to industry.  Zodiac conducts different IT industrial training’s for enhancing the IT skills of the students and to make them ready for both local/global IT industries. The initial mission of Zodiac is to support the students, guide them, train them, and bridging them into the IT industry. </p>
          <p>Zodiac provides high configured lab facilities, highly qualified instructors and industry driven environment. Zodiac also ensures job placement of successful candidates.</p>
          </div>
      </div>
    </div>
  </section>
  <!-- /about -->
<!-- funfacts -->
<section class="section-sm bg-primary">
    <div class="container">
      <div class="row">
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="{{$insctructorCount}}"></h2>
            <h5 class="text-white">TEACHERS</h5>
          </div>
        </div>
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="{{$courseCount}}">{</h2>
            <h5 class="text-white">COURSES</h5>
          </div>
        </div>
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="{{$studentCount}}"></h2>
            <h5 class="text-white">STUDENTS</h5>
          </div>
        </div>
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="{{$workshopCount}}"></h2>
            <h5 class="text-white">Workshops</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /funfacts -->
  
  <!-- success story -->
  <section class="section bg-cover" data-background="{{asset('home/images/backgrounds/success-story.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-4 position-relative success-video">
          <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
            <i class="ti-control-play"></i>
          </a>
        </div>
        <div class="col-lg-6 col-sm-8">
          <div class="bg-white p-5">
            <h2 class="section-title">Success Stories</h2>
            
            <p>After the completation of the courses, many of our trainee able to get their expected jobs.Many of our trainees are working in some reputed companies.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /success story -->
  
  <!-- teachers -->
  <section class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <h2 class="section-title">Our Team</h2>
          </div>
          <!-- teacher -->
          <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
            <div class="card border-0 rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher 1.webp')}}" alt="teacher">
              <div class="card-body">
                <a href="#">
                  <h4 class="card-title text-center">Tanvir</h4>
                </a>
                <div class="d-flex justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <!-- teacher -->
          <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
            <div class="card border-0 rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher 1.webp')}}" alt="teacher">
              <div class="card-body">
                <a href="#">
                  <h4 class="card-title text-center">Suraya</h4>
                </a>
                <div class="d-flex justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <!-- teacher -->
          <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
            <div class="card border-0 rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher 1.webp')}}" alt="teacher">
              <div class="card-body ">
                <a href="#">
                  <h4 class="card-title text-center">Turna</h4>
                </a>
                <div class="d-flex justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <!-- teacher -->
          <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
            <div class="card border-0 rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher 1.webp')}}" alt="teacher">
              <div class="card-body ">
                <a href="#">
                  <h4 class="card-title text-center">Tahia</h4>
                </a>
                <div class="d-flex justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <!-- teacher -->
          <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
            <div class="card border-0 rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="{{asset('home/images/teachers/teacher 1.webp')}}" alt="teacher">
              <div class="card-body ">
                <a href="#">
                  <h4 class="card-title text-center">Fahmedia</h4>
                </a>
                <div class="d-flex justify-content-between">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /teachers --> 
@endsection