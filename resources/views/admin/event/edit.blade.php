@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Events</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item" >Event</li>
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
                        <h3 class="card-title">Edit Event</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-heading">
                                       
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{route('manage-event.update',$event)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title',$event->title)}}" placeholder="Enter Category title" >
                                                        @error('title')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="place">Event Place</label>
                                                        <input class="form-control @error('place') is-invalid @enderror" type="text" id="place" name="place" value="{{old('place',$event->place)}}" placeholder="Enter Category place" >
                                                        @error('place')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="date">Event Date</label>
                                                        <input class="form-control @error('date') is-invalid @enderror" type="date" id="date" name="date" value="{{old('date',$event->date)}}" placeholder="Enter Category date" >
                                                        @error('date')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="time">Event Time</label>
                                                        <input class="form-control @error('time') is-invalid @enderror" type="time" id="time" name="time" value="{{old('time',$event->time)}}" placeholder="Enter Category time" >
                                                        @error('time')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="details">Event Dateils</label>
                                                        <textarea class="form-control @error('details') is-invalid @enderror" type="text" id="details" name="details" placeholder="Enter Category details" >{{$event->details}}</textarea>
                                                        @error('details')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="contact_phone">Contact Phone</label>
                                                        <input class="form-control @error('contact_phone') is-invalid @enderror" type="text" id="contact_phone" name="contact_phone" value="{{old('contact_phone',$event->contact_phone)}}" placeholder="Enter Category contact_phone" >
                                                        @error('contact_phone')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>    
                                                     
                                                    <div class="form-group">
                                                        <label for="contact_email">Contact Email</label>
                                                        <input class="form-control @error('contact_email') is-invalid @enderror" type="text" id="contact_email" name="contact_email" value="{{old('contact_email',$event->contact_email)}}" placeholder="Enter Category contact_email" >
                                                        @error('contact_email')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    {{-- <div class="form-group">
                                                        <label for="image">Banner Image</label>
                                                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{old('image',$event->image)}}" accept="image/*" >
                                                        @error('image')
                                                            <br>
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>                                     --}}
                                                </div>

                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label for="status"> Status</label>
                                                        <input type="checkbox" class="form-control " name="statusCheck" id="statusCheck"  {{($event->status == 1) ? 'checked':''}}>
                                                        <input type="text" class="form-control" name="status" id="status" value="{{old('status',$event->status)}}" style="display:none"> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-md btn-success">Update</button>
                                                    <a href="{{route('admin.show-event')}}" class="btn btn-md btn-success">Cancel</a>
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