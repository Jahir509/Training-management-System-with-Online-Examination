@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Workshops Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item" >Workshop</li>
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
                        <h3 class="card-title">Manage workshops</h3>
                        <div class="card-tools">
                            <a href="javascript:;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Add new workshop</a>
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
                                                    <th>Title</th>
                                                    <th>Place</th>
                                                    <th>Time</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Contact</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($workshops as $index=>$workshop)
                                                    <tr class="odd gradeX">
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$workshop->title}}</td>
                                                        <td>{{$workshop->place}}</td>
                                                        <td>{{$workshop->time}}</td>
                                                        <td>{{$workshop->date}}</td>
                                                        <td>{{($workshop->status == 1) ? 'Active' : 'Inactive'}}</td>
                                                        <td>{{$workshop->contact_phone}}<br>{{$workshop->contact_email}}</td>
                                                        <td class="center">
                                                            <a href="{{route('manage-workshop.show',$workshop)}}" class="btn btn-sm btn-info">Details</a>
                                                            <a href="{{route('manage-workshop.edit',$workshop)}}" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="{{route('manage-workshop.delete',$workshop)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                                <h4 class="modal-title">Add new workshop</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.store-workshop')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">workshop title</label>
                                                <input class="form-control" type="text" id="title" name="title" placeholder="Enter your title" >
                                            </div>

                                            <div class="form-group">
                                                <label for="place">Place</label>
                                                <input class="form-control" type="text" id="place" name="place" placeholder="Enter your place" >
                                            </div>

                                            <div class="form-group">
                                                <label for="time">workshop Time</label>
                                                <input class="form-control" type="time" id="time" name="time" >
                                            </div>

                                            <div class="form-group">
                                                <label for="date">workshop Date</label>
                                                <input class="form-control" type="date" id="date" name="date" >
                                            </div>
                                            <div class="form-group">
                                                <label for="details">Details</label>
                                                <textarea class="form-control" name="details" id="details" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="contact_phone">Contact Phone</label>
                                                <input class="form-control" type="text" id="contact_phone" name="contact_phone" placeholder="Enter your email for contact" >
                                            </div>
                                            <div class="form-group">
                                                <label for="contact_email">Contact Email</label>
                                                <input class="form-control" type="email" id="contact_email" name="contact_email" placeholder="Enter your email for contact" >
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Banner</label>
                                                <input class="form-control" type="file" id="image" name="image" accept="image/*">
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
