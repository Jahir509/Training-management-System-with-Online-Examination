@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$exam->title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item" >Exam</li>
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
                        <h3 class="card-title">Set Exam Question</h3>
                        <div class="card-tools">
                            <a href="javascript:;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Add new Question</a>
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
                                                    <th>Questions</th>
                                                    <th>Ans</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($questions as $index=>$question)
                                                    <tr class="odd gradeX">
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$question->question}}</td>
                                                        <td>{{$question->ans}}</td>
                                                        <td>{{($question->status == 1) ? 'Active' : 'Inactive'}}</td>
                                                        <td class="center">
                                                            <a href="{{route('manage-exam-question.edit',$question)}}" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="{{route('manage-exam-question.delete',$question)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                        </td>
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
                        <div class="modal-dialog modal-lg">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add New Question</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('manage-exam-question.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input class="form-control" type="hidden" id="exam_id" name="exam_id" value="{{$exam->id}}">
                                            <div class="form-group">
                                                <label for="question">Question ? </label>
                                                <input class="form-control" type="text" id="question" name="question" placeholder="Enter you question" >
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="option_1">Options 1</label>
                                                        <input class="form-control" type="text" id="option_1" name="option_1">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="option_2">Options 2</label>
                                                        <input class="form-control" type="text" id="option_2" name="option_2">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="option_3">Options 3</label>
                                                        <input class="form-control" type="text" id="option_3" name="option_3">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="option_4">Options 4</label>
                                                        <input class="form-control" type="text" id="option_4" name="option_4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ans">Answer</label>
                                                <input class="form-control" type="text" id="ans" name="ans">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-md btn-success">Create</button>
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