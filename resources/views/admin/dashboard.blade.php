@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
{{--
      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$categoryCount}}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            @if ($categoryCount!=0)
            <a href="{{route('admin.exam-category')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$courseCount}}<sup style="font-size: 20px"></sup></h3>

              <p>Courses</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            @if ($courseCount!=0)
              <a href="{{route('admin.manage-exam')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>

        <!-- ./col -->
      </div>
--}}
      <div class="row">
         <!-- ./col -->
         <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$instructorCount}}</h3>

              <p>Instructors</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            @if ($instructorCount!=0)
              <a href="{{route('admin.manage-instructor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$workshopCount}}</h3>

              <p>Workhops</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            @if ($workshopCount!=0)
              <a href="{{route('admin.show-workshop')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                  <div class="inner">
                      <h3>{{$studentCount}}</h3>

                      <p>Students</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                  </div>
                  @if ($studentCount!=0)
                      <a href="{{route('admin.show-students')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  @endif
              </div>
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
