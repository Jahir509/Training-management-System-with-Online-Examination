@extends('frontend.layout')

@section('title-section')
    <!-- page title -->
    <section class="page-title-section overlay" data-background="{{asset('home/images/backgrounds/page-title.jpg')}}">
        <div class="container">
        <div class="row">
            <div class="col-md-8">
            <ul class="list-inline custom-breadcrumb">
                <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our Courses</a></li>
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
<div class="container">
    <section class="section">
        <h2>Running Courses</h2>
        <div class="container">
            <!-- course list -->
            <div class="row justify-content-center">
                @foreach ($courses as $course)
                    @if($course->is_upcoming != 1)
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card p-0 border-primary rounded-0 hover-shadow">
                            <img class="card-img-top rounded-0" src="{{asset('media/courses/'.$course->image)}}" alt="course thumb">
                            <div class="card-body">
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>{{date('d-M-y',strtotime($course->created_at))}}</li>
                                <li class="list-inline-item"><a class="text-color" href="#">{{$course->category_name}}</a></li>
                            </ul>
                            <a href={{route('course.show',$course)}}>
                                <h4 class="card-title">{{$course->title}}</h4>
                            </a>
                            <p class="card-text mb-4"> {{$course->details}}</p>
                            <a href="{{route('course.show',$course)}}" class="btn btn-primary btn-sm">Apply now</a>
                            </div>
                        </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- /course list -->
        <h2>Upcoming Courses</h2
        <!-- course list -->
        <div class="row justify-content-center">
            @foreach ($courses as $course)
                @if($course->is_upcoming == 1)
                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card p-0 border-primary rounded-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="{{asset('media/courses/'.$course->image)}}" alt="course thumb">
                        <div class="card-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>{{date('d-M-y',strtotime($course->created_at))}}</li>
                            <li class="list-inline-item"><a class="text-color" href="#">{{$course->category_name}}</a></li>
                        </ul>
                        <a href={{route('course.show',$course)}}>
                            <h4 class="card-title">{{$course->title}}</h4>
                        </a>
                        <p class="card-text mb-4"> {{$course->details}}</p>
                        <a href="{{route('course.show',$course)}}" class="btn btn-primary btn-sm">Apply now</a>
                        </div>
                    </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- /course list -->   
        </div>
    </section>
</div> 
@endsection