@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Portal Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item" >Portal</li>
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
                        <h3 class="card-title">Manage Portal</h3>
                        <div class="card-tools">
                            <a href="javascript:;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Add new Portal</a>
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($portals as $index=>$portal)
                                                    <tr class="odd gradeX">
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$portal->name}}</td>
                                                        <td>{{$portal->email}}</td>
                                                        <td>{{$portal->mobile_no}}</td>
                                                        <td>{{($portal->status == 1) ? 'Active' : 'Inactive'}}</td>
                                                        <td class="center">
                                                            <a href="{{route('manage-portal.edit',$portal)}}" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="{{route('manage-portal.delete',$portal)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create new Portal</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('manage-portal.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your Name" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter your Email" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">                           
                                            <div class="form-group">
                                                <label for="mobile_no">Mobile</label>
                                                <input class="form-control" type="text" id="mobile_no" name="mobile_no" placeholder="Enter your Mobile No." >
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Enter your Password" >
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