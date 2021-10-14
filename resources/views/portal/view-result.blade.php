@extends('layouts.user')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">Exam Status</h4>
            <table>
              <tbody>
                  <tr>
                    <td><i>Subject</i></td>
                    <td><i>: {{$result->exam_title}}</i></td>
                  </tr>
                  <tr>
                    <td><i>Name</i></td>
                    <td><i>: {{$user->name}}</i></td>
                  </tr>
                  <tr>
                    <td><i>Email</i></td>
                    <td><i>: {{$user->email}}</i></td>
                  </tr>
              </tbody>
            </table>
          </div>
          <div class="card-body">
            @if ($result->status == 'Passed')
                <div class="alert alert-success">
                    You have passed the exam <br>
                    Right Answere : {{$result->right_ans ? $result->right_ans : 0}}<br>
                    Wrong Answere : {{$result->wrong_ans ? $result->wrong_ans : 0}}
                </div>
            @else
                <div class="alert alert-danger">
                    You have failed the exam <br>
                    Right Answere : {{$result->right_ans ? $result->right_ans : 0}}<br>
                    Wrong Answere : {{$result->wrong_ans ? $result->wrong_ans : 0}}
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
  <!-- Thankyou Modal -->
  @if($result->status !== 'Passed')
    <button data-target="#pmd-title-dialog" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-btn-raised" type="button">Register Again !</button>
  @endif
    <div tabindex="-1" class="modal pmd-modal fade text-center" id="pmd-title-dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <div class="pmd-card-icon">
            <img style="height:200px" src="{{asset('assets/img/R.png')}}" alt="">
          </div>
          <h2 style="margin: 0 auto">Thank you for participate in zodiac examination system!</h2>

          <p>Thank you for participate in zodiac examination system. Unfortunately you don't pass the exam. You can try again.</p>
          <p>Do you want to try again? </p>
          <p><b class="text-danger">N.B: " You have to register again for participating in the exam "</b></p>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer pmd-modal-border text-right">
          <a href="{{route('portal.exam-info',$result->exam_id)}}" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Yes, I want</a>
          <a href="{{route('portal.exam')}}" class="btn pmd-btn-flat pmd-ripple-effect btn-dark" type="button">No, I won't</a>
        </div>
      </div>
    </div>
  </div>
  </div>

   
@endsection