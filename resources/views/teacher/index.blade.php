@extends('layouts.teacher')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                                                    <td>
                                                        <a href="{{route('add-exam-question',$course->course_id)}}" class="btn btn-sm btn-info" >Add Question</a>
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
            </div>
        </div>
    </div>
</div>
@endsection