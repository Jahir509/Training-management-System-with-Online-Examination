@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Teachers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item" >Teacher</li>
              <li class="breadcrumb-item active"><a href="#">Edit</a></li>
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
            <div class="col-7">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Teacher : <strong>{{$teacher->name}}</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-heading">
                                       
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{route('assign-instructor.store',$teacher)}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter your Name" value={{$teacher->name}} readonly>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your Email" value={{$teacher->email}} readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mobile_no">Mobile</label>
                                                        <input class="form-control" type="text" id="mobile_no" name="mobile_no" placeholder="Enter your Mobile No." value={{$teacher->mobile_no}} readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Course</label>
                                                        <select class="form-control" name="course_id" id="course_id" required>
                                                            <option value="">Select Course</option>
                                                            @foreach ($courses as $course)w
                                                                <option value="{{$course->id}}">{{$course->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-md btn-success">Assign</button>
                                                    <a href="{{route('admin.manage-instructor')}}" class="btn btn-md btn-danger">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
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
                       footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-5">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assigned Courses</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-heading">
                                       
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Course</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($assignedCoursesToInstructor as $index=>$course)
                                                    <tr class="odd gradeX">
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$course->name}}</td>
                                                        <td><a href="{{route('assign-course.delete',$course)}}" class="btn btn-sm btn-danger" id="delete1">Unassign</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                    </div>
                    <!-- /.card-body -->

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
