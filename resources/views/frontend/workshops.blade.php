@extends('frontend.layout')

@section('title-section')
  <!-- page title -->
<section class="page-title-section overlay" data-background="{{asset('home/home/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Workshops</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten"></p>
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
      @foreach ($workshops as $index=>$workshop)
        <!-- workshop -->
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card border-0 rounded-0 hover-shadow">
            <div class="card-img position-relative">
              <img class="card-img-top rounded-0" src="{{asset('media/workshops/'.$workshop->image)}}" alt="{{$workshop->image}}">
              <div class="card-date"><span>{{date('d',strtotime($workshop->date))}}</span><br>{{date('M',strtotime($workshop->date))}}</div>
            </div>
            <div class="card-body">
              <!-- location -->
              <p><i class="ti-location-pin text-primary mr-2"></i>{{$workshop->place}}</p>
              <a href="{{route('workshop.show',$workshop)}}">
                <h4 class="card-title">{{$workshop->title}}</h4>
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