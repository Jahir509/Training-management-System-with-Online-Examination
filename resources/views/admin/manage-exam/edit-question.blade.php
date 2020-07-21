@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Questions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item" >Exam</li>
              <li class="breadcrumb-item active"><a href="#">Question</a></li>
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                        <h3 class="card-title">Edit Question</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-heading">
                                       
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{route('manage-exam-question.update',$question)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="question">Question</label>
                                                        <input class="form-control @error('question') is-invalid @enderror" type="text" id="question" name="question" value="{{old('question',$question->question)}}" placeholder="Enter Category question" >
                                                        @error('question')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="ans">ans</label>
                                                        <input class="form-control @error('ans') is-invalid @enderror" type="text" id="ans" name="ans" value="{{old('ans',$question->ans)}}" placeholder="Enter Category ans" >
                                                        @error('ans')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="option_41">option 1</label>
                                                        <input class="form-control @error('option_1') is-invalid @enderror" type="text" id="option_1" name="option_1" value="{{$options['option_1']}}" placeholder="Enter Category option_1" >
                                                        @error('option_1')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="option_2">option 2</label>
                                                        <input class="form-control @error('option_2') is-invalid @enderror" type="text" id="option_2" name="option_2" value="{{$options['option_2']}}" placeholder="Enter Category option_2" >
                                                        @error('option_2')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="option_3">option 3</label>
                                                        <input class="form-control @error('option_3') is-invalid @enderror" type="text" id="option_3" name="option_3" value="{{$options['option_3']}}" placeholder="Enter Category option_3" >
                                                        @error('option_3')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="option_4">option 4</label>
                                                        <input class="form-control @error('option_4') is-invalid @enderror" type="text" id="option_4" name="option_4" value="{{$options['option_4']}}" placeholder="Enter Category option_4" >
                                                        @error('option_4')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>                                         
                                                </div>

                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="status"> Status</label>
                                                        <input type="checkbox" class="form-control " name="statusCheck" id="statusCheck"  {{($question->status == 1) ? 'checked':''}}>
                                                        <input type="text" class="form-control" name="status" id="status" value="{{old('status',$question->status)}}" style="display:none"> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-md btn-success">Update</button>
                                                    <a href="{{route('manage-exam.question',$question->exam_id)}}" class="btn btn-md btn-success">Cancel</a>
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
                        Footer
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
@section('scripts')
 <script>
    $(document).ready(function(){
        $("#statusCheck").click(function(){
            if($(this).prop("checked") == true){
                $("#status").val("1");
            }
            else if($(this).prop("checked") == false){
                $("#status").val("0");
            }
        });
    }); 
</script>   
@endsection