@extends('layouts.user')
@section('content')
<style>
   .question_options{
        list-style: none;
        padding:0px;
        line-height: 40px;
   }
</style>
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h3 class="card-title"> Join Exam</h3>
            <div class="category">
                <div class="row">
                    <div class="col-4">
                        <h4 >TIME : <span class="js-text">1 hour</span></h4>
                    </div>
                    <div class="col-4">
                        <h4 class="text-center"><span class="js-timeout alert alert-danger">59:59</span></h4>
                    </div>
                    <div class="col-4">
                        <h4 class="text-right">Status : Pending</h4>
                    </div>
                </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
                <form action="{{route('portal.submit-exam')}}" method="post" >
                    @csrf
                    <input type="hidden" name="exam_id" value="{{ Request::segment(4) }}">
                    <input type="hidden" name="count" value="{{count($exam_questions)}}">
                    <div class="row">
                        @foreach ($exam_questions as $index=>$question)
                            <div class="col-12">
                                <h4 class="card-title" style="color:yellow" >{{$index+1}}. Question : {{$question->question}}</h4>
                                    @php
                                        $option = json_decode($question->options,true);
                                    @endphp
                                    <input type="hidden" name="question{{$index+1}}" value="{{$question->id}}">
                                    <ul class="question_options">
                                    <li> <input type="radio" name="ans{{$index+1}}" value= "{{$option['option_1'] }}" > <span style="padding-left: 5px">{{$option['option_1'] }}</span></li>
                                    <li> <input type="radio" name="ans{{$index+1}}" value= "{{$option['option_2'] }}" > <span style="padding-left: 5px">{{$option['option_2'] }}</span></li>
                                    <li> <input type="radio" name="ans{{$index+1}}" value= "{{$option['option_3'] }}" > <span style="padding-left: 5px">{{$option['option_3'] }}</span></li>
                                    <li> <input type="radio" name="ans{{$index+1}}" value= "{{$option['option_4'] }}" > <span style="padding-left: 5px">{{$option['option_4'] }}</span></li>
                                    <li style="display:none"><input value="0" type="radio" checked="checked" name="ans{{$index+1}}">{{$option['option_4'] }}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-12">
                        <button id="btn_data" type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>

  <script type="text/javascript">

	var interval;
	function countdown() {
	  clearInterval(interval);
	  interval = setInterval( function() {
	      var timer = $('.js-timeout').html();
	      timer = timer.split(':');
	      var minutes = timer[0];
	      var seconds = timer[1];
	      seconds -= 1;
	      if (minutes < 0) return;
	      else if (seconds < 0 && minutes != 0) {
	          minutes -= 1;
	          seconds = 59;
	      }
	      else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

	      $('.js-timeout').html(minutes + ':' + seconds);

	      if (minutes == 0 && seconds == 0) { clearInterval(interval);alert('Time Up'); $('#btn_data').click()}
	  }, 1000);
	}

	$('.js-timeout').text("1:00");
/*
  $('.js-text').text("01:00");
*/

	countdown();

</script>
@endsection
