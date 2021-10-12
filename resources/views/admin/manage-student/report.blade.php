@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Exam Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item" >Exam Report</li>
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
                            {{--<div class="card-header">

                                <div class="row align-content-between">
--}}{{--
                                    <div class="col"><button class="btn btn-sm btn-outline-info">Search Exam</button></div>
--}}{{--
                                    </div>
                                </div>
                                <div class="card-tools">
                                </div>
                            </div>--}}
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
                                                        <th>Title</th>
                                                        <th>Exam Date</th>
                                                        <th>Category</th>
                                                        <th>Status</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($exams as $index=>$exam)
                                                        <tr class="odd gradeX">
                                                            <td>{{$index+1}}</td>
                                                            <td>{{$exam->title}}</td>
                                                            <td>{{$exam->exam_date}}  |  <span class="text text-success">( Added {{$exam->created_at->diffForHumans()}} )</span> </td>
                                                            <td>{{$exam->category}}</td>
                                                            <td>{{($exam->status == 1) ? 'Active' : 'Inactive'}}</td>
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
                                <button  class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print Report</button>

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
