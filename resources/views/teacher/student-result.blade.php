@extends('layouts.teacher')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Students Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item" >Student</li>
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
                                <h3 class="card-title">Manage Students</h3>
                               {{-- <div class="card-tools">
                                    <a href="javascript:;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Add new Student</a>
                                </div>--}}
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Exam Date</th>
                                                        <th>Exam</th>
                                                        <th>Status</th>
                                                        <th>Results</th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($students as $index=>$student)
                                                        <tr class="odd gradeX">
                                                            <td>{{$index+1}}</td>
                                                            <td>{{$student->name}}</td>
                                                            <td>{{$student->email}}</td>
                                                            <td>{{$student->mobile_no}}</td>
                                                            <td>{{$student->dob}}</td>
                                                            <td>{{$student->exam_name}}</td>
                                                            <td>{{($student->status == 1) ? 'Active' : 'Inactive'}}</td>
                                                            <td>{{$student->result}}</td>

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
                                <button  class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
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
