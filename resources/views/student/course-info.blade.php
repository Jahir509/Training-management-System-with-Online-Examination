@extends('layouts.user')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8">
        <form action="{{route('portal.student-exam-info')}}" method="post">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Edit Profile</h5>
          </div>
          <div class="card-body">

            @csrf
              <div class="row">
                <div class="col-md-6 pr-md-1">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control"  style="color:#cdd9e6" id="name" name="name" value="{{auth()->user()->name}}" readonly="readonly">
                  </div>
                </div>
                <div class="col-md-6 pl-md-1">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control " id="email" name="email" style="color:#cdd9e6" value="{{auth()->user()->email}}" readonly="readonly">
                  </div>
                </div>
                <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                      <label>Mobile</label>
                      <input type="text" class="form-control"  id="mobile_no" name="mobile_no" value="{{auth()->user()->mobile_no}}" placeholder="ex: 01xxxxxxxxx">
                    </div>
                </div>
                {{-- <div class="col-md-6 pl-md-1">
                    <div class="form-group">
                      <label>DOB</label>
                      <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" required>
                    </div>
                    @error('dob')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                      <label>Course</label>
                      <input type="text" class="form-control txt-white" style="color:#cdd9e6" value="{{$exam->title}}" readonly="readonly">
                      <input type="hidden" class="form-control" name="exam" id="exam" value="{{$exam->id}}" readonly="readonly">
                      <input type="hidden" class="form-control" name="dob" id="dob" value="{{$exam->exam_date}}" readonly="readonly">
                    </div>
                </div>
                {{-- <div class="col-md-6 pl-md-1">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control"  id="password" name="password" placeholder="ex: ********** " required>
                    </div>
                </div>               --}}
              </div>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-success">Enroll</button>
          </div>
        </div>
    </form>
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="card-body">
            <p class="card-text">
              <div class="author">
                <div class="block block-one"></div>
                <div class="block block-two"></div>
                <div class="block block-three"></div>
                <div class="block block-four"></div>
                <a href="javascript:void(0)">
                  <h2 class="title">{{$exam->title}}</h2>
                </a>
                <strong><h3 class="title">Start Date: {{ date('d,M,Y',strtotime($exam->exam_date)) }}</h3></strong>
              </div>
            </p>
            <div class="card-description">
              {{$exam->details}}
            </div>
          </div>
          <div class="card-footer">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
