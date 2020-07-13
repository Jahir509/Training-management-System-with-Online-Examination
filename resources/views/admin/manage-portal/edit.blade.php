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
              <li class="breadcrumb-item" >Portals</li>
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
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Portal : <strong>{{$portal->name}}</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-heading">
                                      
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{route('manage-portal.update',$portal)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name',$portal->name)}}" placeholder="Enter Category name" >
                                                        @error('name')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{old('email',$portal->email)}}" placeholder="Enter Category email" >
                                                        @error('email')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="mobile_no">Mobile no</label>
                                                        <input class="form-control @error('mobile_no') is-invalid @enderror" type="text" id="mobile_no" name="mobile_no" value="{{old('mobile_no',$portal->mobile_no)}}" placeholder="Enter Category mobile_no" >
                                                        @error('mobile_no')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{old('password',$portal->password)}}" placeholder="Enter Category password" >
                                                        @error('password')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <input type="checkbox" class="form-control " name="statusCheck" id="statusCheck"  {{($portal->status == 1) ? 'checked':''}}>
                                                        <input type="hidden" class="form-control" name="status" id="status" value="{{old('status',$portal->status)}}"> 
                                                    </div>
                                                </div><hr>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-md btn-success">Update</button>
                                                    <button href="{{route('admin.manage-portal')}}" class="btn btn-md btn-danger">Cancel</button>
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