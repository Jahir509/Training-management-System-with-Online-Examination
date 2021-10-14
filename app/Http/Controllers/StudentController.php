<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use App\Oex_portal;
use App\Oex_result;
use App\Oex_student;
use App\Oex_question;
use App\Oex_exam_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $user_id = auth()->user()->id;
        $totalCourse = Oex_exam_master::count();
        $student = User::findOrFail($user_id);
        $yourCourseCount = Oex_student::join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
                                    ->where('email',$student->email)->count();



        return view('student.index',compact('totalCourse','yourCourseCount'));
    }

    public function showAllCourse()
    {
        $portalExams = Oex_exam_master::orderBy('title','asc')
        ->get();
        return view('student.showAllCourse',compact('portalExams'));
    }

    public function showMyCourse()
    {
        $portalExams = Oex_student::join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
                                    ->select('oex_students.*','oex_exam_masters.title as exam_title','oex_exam_masters.id as exam_id','oex_exam_masters.exam_date as exam_date','oex_categories.name as exam_category','oex_categories.field as exam_department')
                                    ->where('email',$student->email)->get();
        return view('student.showMyCourse',compact('portalExams'));
    }

    public function portalExamInfo(Oex_exam_master $exam)
    {
        //dd($exam);
       return view('student.course-info',compact('exam'));
    }

    public function storeStudenExamInfo(Request $request)
    {

       // dd($request);
        $user = User::findOrFail(auth()->user()->id);
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => ['required','max:11'],
            'exam' => 'required',
            'dob' => 'required',

        ]);


			$alreadyRegistered = Oex_student::where('email',$user->email)->where('exam',(int)$request->exam)->first();
        if($alreadyRegistered){
        		$student = Oex_student::where('email',$user->email)->first();
        		$student->result = null;
						$student->update();
						$notification = array(
							'message' => 'Your Re-Registration completed again',
							'alert-type' => 'success'
						);
						return redirect()->route('portal.exam')->with($notification);
        }

        else{
					$student = new Oex_student();

					$student->name = $request->name ;
					$student->email = $request->email ;
					$student->mobile_no = $request->mobile_no ;
					$student->exam = $request->exam ;
					$student->dob = $request->dob ;
					$student->status = 1 ;

					if($student->email == $user->email){
						$student->save();
						$notification=array(
							'message'=>'You have been registered successfully',
							'alert-type'=>'success'
						);
						return redirect()->route('portal.print-accessCard',$student)->with($notification);
					}

					else
					{
						$notification=array(
							'message'=>'Request Timeout',
							'alert-type'=>'error'
						);
						return redirect()->back()->with($notification);

					}

				}

    }

    public function printStudenExamInfo(Oex_student $student)
    {

        $exam = Oex_exam_master::findOrFail($student->exam);

        return view('portal.print-student-info',compact('student','exam'));
    }

    public function portalExam()
    {

        $student = User::findOrFail(auth()->user()->id);
        $student_exams = Oex_student::join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
        ->select('oex_students.*',
					'oex_exam_masters.title as exam_title',
					'oex_exam_masters.id as exam_id',
					'oex_exam_masters.exam_date as exam_date',
					'oex_exam_masters.category as exam_category',
					'oex_exam_masters.file as file'
				)
        ->where('email',$student->email)->get();
        return view ('portal.exam',compact('student','student_exams'));
    }

    public function portalJoinExam($exam_id)
    {
        $user_id = auth()->user()->id;
        $student = User::findOrFail($user_id);
        $exam_questions = Oex_question::orderBy('id','asc')->where('exam_id',$exam_id)->get();
        return view ('portal.join-exam',compact('student','exam_questions','exam_id'));
    }

    public function portalSubmitExam(Request $request){

        //result data
        $right_ans = 0;
        $wrong_ans = 0;

        //die($request->exam_id);
        $data = $request->all();
        $result = array();
        for($i=1;$i<=$request->count;$i++)
        {
            if(isset($data['question'.$i]))
            {
                $question = Oex_question::findOrFail($data['question'.$i]);
                if($question->ans == $data['ans'.$i]){
                    $result[$data['question'.$i]] = 'YES';
                    $right_ans++;
                }
                else{
                    $result[$data['question'.$i]] = 'NO';
                    $wrong_ans++;
                }
            }
        }

        $user_id = auth()->user()->id;
        $get_user = User::findOrFail($user_id);
        $update_student = Oex_student::where('email',$get_user->email)->where('exam',$request->exam_id)->first();
        $exam_result = new Oex_result();
        $exam_result->exam_id = $request->exam_id;
        $exam_result->user_id = $user_id;
        $exam_result->right_ans = $right_ans;
        $exam_result->wrong_ans = $wrong_ans;
        if(($right_ans*100)/$request->count >= 80 )
        {
            $exam_result->status = 'Passed';
        }
        else
        {
            $exam_result->status = 'Failed';

        }
        $exam_result->result_json = json_encode($result);
        $update_student->result = $exam_result->status;
        $exam_result->save();
        //dd($update_student->result);
				$exam_id = $request->exam_id;
        $update_student->update();
        return redirect()->route('portal.view-result',$exam_result);


    }
    public function portalViewExamResult($exam_result)
    {
				$user_id = auth()->user()->id;
				$user = User::findOrFail($user_id);
        $result = Oex_result::join('oex_exam_masters','oex_results.exam_id','=','oex_exam_masters.id')
					->select('oex_results.*',
						'oex_exam_masters.title as exam_title',
						'oex_exam_masters.id as exam_id',
						'oex_exam_masters.category as exam_category'
					)
					->where('oex_results.id',$exam_result)->first();
        return view('portal.view-result',compact('result','user'));
        //echo($exam_result);
    }

    public function profile(){
        $user = auth()->user();
        return view('student.profile',compact('user'));
    }
    public function updateProfile(Request $request){

        $user = User::findOrFail(auth()->user()->id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->mobile_no = $request->mobile_no;
        // $user->password=$request->password;

        $user->update($request->all());
        $notification=array(
            'message'=>'Profile has been updated',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);;
    }

	public function download($uuid)
	{
		$book = Oex_exam_master::where('file', $uuid)->firstOrFail();
		$pathToFile = storage_path('app/materials/' . $book->file);
		return response()->download($pathToFile);
	}
}
