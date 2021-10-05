@extends('layouts.user')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title"> Status</h4>
          </div>
          <div class="card-body">
            @if ($result->status == 'Passed')
                <div class="alert alert-success">
                    You have passed the exam <br>
                    Right Answere : {{$result->right_ans}}<br>
{{--
                    Wrong Answere : {{$result->wrong_ans}}
--}}
                </div>
            @else
                <div class="alert alert-danger">
                    You have failed the exam <br>
                    Right Answere : {{$result->right_ans}}<br>
{{--
                    Wrong Answere : {{$result->wrong}}
--}}
                </div>
            @endif    
          </div>
          <div class="row no-print">
            <div class="col-6">
              <button  class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
              {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
				Payment
			  </button>
			  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
				<i class="fas fa-download"></i> Generate PDF
			  </button> --}}
            </div>
            <div class="col-6">
              <a href="{{route('portal.exam')}}" class="btn bntn-md btn-success">Close</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
   
@endsection