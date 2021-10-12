@extends('layouts.teacher')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Course Material</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Teacher</a></li>
              <li class="breadcrumb-item" >Course</li>
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
                        <h3 class="card-title">Manage Material</h3>
                        <div class="card-tools">
                            <a href="javascript:;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Add new Material</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-heading">
                                        @if ($errors->any())
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><br>
                                        @endif
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Course Title</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>File</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach ($assignedCoursesToInstructor as $index=>$exam)
                                                    <tr class="odd gradeX">
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$exam->title}}</td>
                                                        <td>{{$exam->category}}</td>
                                                        <td>{{($exam->status == 1) ? 'Active' : 'Inactive'}}</td>
                                                        @if($exam->file)
                                                            <td>
                                                                <a href="{{ route('books.download', $exam->file) }}" class="btn btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                                <a href="{{route('books.delete',$exam->id)}}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                <span>( Uploaded {{$exam->updated_at->diffForHumans()}} )</span>
                                                            </td>
                                                        @else
                                                            <td><span class="text-danger"> No file uploaded yet</span></td>
                                                        @endif

                                                       {{-- <td class="center">
                                                            <a href="{{route('manage-exam.edit',$exam->)}}" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="{{route('manage-exam.delete',$exam)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                            <a href="{{route('manage-exam.question',$exam)}}" class="btn btn-sm btn-info">Add Question</a>

                                                        </td>--}}
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
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new Exam</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('teacher.upload-course-material')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Course Title</label>
                                                <select class="form-control" name="category" id="category" required>
                                                    <option value="">Select Course</option>
                                                    @foreach ($assignedCoursesToInstructor as $index=>$course)
                                                        <option value="{{$course->course_id}}">{{$course->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="file_name">File </label>
                                                <input class="form-control" type="file" id="file_name" name="file_name" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-sm btn-success">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        
                        </div>
                    </div>	
                    <!--End modal -->
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