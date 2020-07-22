@extends('layouts.user')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Edit Profile</h5>
          </div>
          <div class="card-body">
            <form action="{{route('portal.updateProfile',$user)}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-md-6 pr-md-1">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{auth()->user()->name}}">
                  </div>
                </div>
                <div class="col-md-6 pl-md-1">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{auth()->user()->email}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mobile No</label>
                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="mobile_no>" value="{{auth()->user()->mobile_no}}">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      
                      <input type="hidden" class="form-control" id="password" name="password" placeholder="password>" value="{{auth()->user()->password}}">
                    </div>
                  </div>
              </div><hr>
              <button type="submit" class="btn btn-fill btn-primary">Update</button>
              <a href="{{route('portal.home')}}" class="btn btn-fill btn-success">Cancel</a>
            </form>
          </div>
          <div class="card-footer">
            
          </div>
        </div>
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
                  <img class="avatar" src="../assets/img/emilyz.jpg" alt="...">
                  <h5 class="title">{{auth()->user()->name}}</h5>
                </a>
                <p class="description">
                  {{auth()->user()->email}}
                </p>
              </div>
            </p>
            
          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection