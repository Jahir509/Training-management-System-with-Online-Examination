@extends('layouts.user')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title"> Simple Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTables-example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Exam Title</th>
                            <th>Exam Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Course Material</th>
                            <th>Action</th>
                            <th>Result</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student_exams as $index=>$exam)
                            <tr class="text-primary">
                                <td>{{$index+1}}</td>
                                <td>{{$exam->exam_title}}</td>
                                <td>{{$exam->exam_date}}</td>
                                <td>{{$exam->exam_category}}</td>
                                @if (strtotime($exam->exam_date) < strtotime(date('Y-m-d')))

                                    <td><p class="text-danger">Closed</p></td>
                                    <td>No Action Available</td>
                                    <td>{{($exam->result) ? $exam->result : 'No Result Available'}}</td>
                                @elseif (strtotime($exam->exam_date) > strtotime(date('Y-m-d')))

                                    <td><p class="text-warning">Upcoming</p></td>
                                    <td>Exam is in progress</td>
                                    <td>{{($exam->result) ? $exam->result : 'No Result Available'}}</td>
                                @else

                                   <td> <p class="text-success">Happening</p></td>
                                  @if($exam->file)
                                    <td>
                                      <a href="{{ route('books.download', $exam->file) }}" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i></a>
                                      <span>( Uploaded {{$exam->updated_at->diffForHumans()}} )</span>
                                    </td>
                                  @else
                                    <td><span class="text-danger"> No file uploaded yet</span></td>
                                  @endif
                                   <td>
                                        @if ( $exam->result != "Passed")
                                          <a href="{{route('portal.join-exam',$exam->exam_id)}}" class="btn btn-info"> Participate</a>
                                        @else
                                          <p class="text-info">Completed</p>
                                        @endif
                                   </td>
                                   <td>{{$exam->result}}</td>
                                @endif
                                {{-- <td>{{$exam->category_name}}</td>                                                        <td>{{($exam->status == 1) ? 'Active' : 'Inactive'}}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
