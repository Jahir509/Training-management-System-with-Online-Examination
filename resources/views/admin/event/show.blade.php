@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Events Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item" >Event</li>
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>{{$event->title}}</strong></h3>
                        <div class="card-tools">
                            <a href="{{route('manage-event.edit',$event)}}" class="btn btn-sm btn-success">Edit Event Information</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-heading">
                                       <strong>Event Date : </strong>{{$event->date}}<br>
                                       <strong>Event Time : </strong>{{$event->time}}<br>
                                       <strong>Event Place : </strong>{{$event->place}}
                                    </div><br>
                                    <div class="panel-body">
                                       <div class="row">
                                            <h4>Event Details</h4>
                                            {{$event->details}}
                                       </div><br>
                                        <div class="row">
                                            <h4>Banner Image</h4><hr>
                                            <img src="{{asset('media/events/'.$event->image)}}"  height="400px" weight="400px" alt="">
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <h4>Contact Information</h4>
                        Mobile : {{$event->contact_phone}}<br>
                        Email : {{$event->contact_email}}<br>
                        <div class="row">
                          <a href="{{route('admin.show-event')}}" class="btn btn-md btn-success">Cancel</a>
                        </div>

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection