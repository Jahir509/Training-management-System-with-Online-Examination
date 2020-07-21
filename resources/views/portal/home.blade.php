@extends('layouts.user')
@section('content')
<div class="content">
    <div class="row">
        @foreach ($portalExams as $index=>$exam)
            @php
                $val = $index+1;
                
                $currentDate = date('Y-m-d');
                $examDate = $exam->exam_date;

                    if ($val%2==1) {
                        # code...
                    $icon = "icon-time-alarm text-success" ;

                    }
                    else {
                        # code...
                        $icon = "icon-send text-success";

                    }
                    
                    if(strtotime($currentDate) > strtotime($examDate)){
                        $cssClass = "bg-danger";
                        $text = "Exam Closed";
                    }
                    else {
                        $cssClass = "";
                        $text = "Exam Date: "."$examDate";
                    }
                    
            @endphp
        <div class="col-lg-6">
            <div class="card card-chart {{$cssClass}} ">
              <div class="card-header">
                  <h3 class="card-title"><i class="tim-icons {{$icon}}"></i>{{$exam->exam_title}}</h3>
                  <h5 class="card-title">Exam Category : <strong>{{$exam->exam_category}}</strong></h5>
                  <h5 class="card-title">Deaprtment : <strong>{{$exam->exam_department}}</strong></h5>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 offset-6">
                        <i class="tim-icons icon-paper text-success"></i><h4 class="txt-white">{{$text}}</h4>
                        @if(strtotime($currentDate) < strtotime($examDate))
                            <a href="{{route('portal.exam-info',$exam)}}" >take quiz</a>
                        @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
 
        @endforeach
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-chart">
          <div class="card-header ">
            <div class="row">
              <div class="col-sm-6 text-left">
                <h5 class="card-category">Total Shipments</h5>
                <h2 class="card-title">Performance</h2>
              </div>
              <div class="col-sm-6">
                
              </div>
            </div>
          </div>
          <div class="card-body">
            
          </div>
        </div>
      </div>
    </div>

    
</div>
@endsection