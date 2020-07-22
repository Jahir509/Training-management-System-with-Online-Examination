@extends('layouts.user')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6 text-center">
              <div class="card card-chart">
                <div class="card-header">
                  
                </div>
                <a href="{{route('portal.showAll')}}">
                    <div class="card-body">
                        <h1 class="card-category">Total Course</h1>
                        <h2 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> {{$totalCourse}}</h2>
                        <h5>Show all courses</h5>
                    </div>
                </a>
              </div>
            </div>
            
            <div class="col-lg-6 text-center">
                <div class="card card-chart">
                  <div class="card-header">
                  </div>
                  <a href="{{route('portal.exam')}}">
                        <div class="card-body ">
                            <h1 class="card-category">Total Course</h1>
                            <h2 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> {{$yourCourseCount}}</h2>
                            <h5>Show your courses</h5>
                        </div>
                    </a>
                
                </div>
              </div>
              
          </div>
      </div>
    </div>
  </div>
@endsection