@extends('frontend.layout')

@section('title-section')
  <!-- page title -->
<section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Our Blog</a></li>
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
<!-- blogs -->
<section class="section">
    <div class="container">
      <div class="row">
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/blog/post-1.jpg')}}" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 28, 2018</li>
                <!-- author -->
                <li class="list-inline-item mr-3 ml-0">By Somrat Sorkar</li>
              </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/blog/post-2.jpg')}}" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 13, 2018</li>
                <!-- author -->
                <li class="list-inline-item mr-3 ml-0">By Jonathon Drew</li>
              </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/blog/post-3.jpg')}}" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 24, 2018</li>
                <!-- author -->
                <li class="list-inline-item mr-3 ml-0">By Alex Pitt</li>
              </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/blog/post-1.jpg')}}" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 28, 2018</li>
                <!-- author -->
                <li class="list-inline-item mr-3 ml-0">By Somrat Sorkar</li>
              </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/blog/post-2.jpg')}}" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 13, 2018</li>
                <!-- author -->
                <li class="list-inline-item mr-3 ml-0">By Jonathon Drew</li>
              </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{asset('home/images/blog/post-3.jpg')}}" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 24, 2018</li>
                <!-- author -->
                <li class="list-inline-item mr-3 ml-0">By Alex Pitt</li>
              </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>
  <!-- /blogs -->
@endsection