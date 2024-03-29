<?php

namespace App\Http\Controllers;

use App\AssignCourse;
use App\Oex_question;
use App\Oex_exam_master;
use App\Oex_student;
use App\User;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;


class TeacherController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $assignedCoursesToInstructor = AssignCourse::join('oex_exam_masters','assign_courses.course_id','=','oex_exam_masters.id')
        ->select(['assign_courses.*','oex_exam_masters.title as name'])
        ->where('instructor_name',auth()->user()->name)->get();
        return view('teacher.index',compact('assignedCoursesToInstructor'));
    }


    public function addQuestion($id){
        $questions = Oex_question::orderBy('id','asc')->where('exam_id',$id)->get();
        $exam = Oex_exam_master::findOrFail($id);
        return view ('teacher.add-question',compact('exam','questions'));
        die($questions);
    }


    public function storeQuestion(Request $request){
        $validateData = $request->validate([
            'exam_id' => 'required',
            'question' => 'required',
            'option_1'=> 'required',
            'option_2'=> 'required',
            'option_3'=> 'required',
            'option_4'=> 'required',
            'ans' => 'required',
           ]);

           $exam_question = new Oex_question();
        //    dd($request->all());\
            $exam_question->exam_id = $request->exam_id ;
            $exam_question->question = $request->question ;
            $exam_question->ans = $request->ans ;
            $exam_question->options = json_encode(array(
                'option_1'=> $request->option_1,
                'option_2'=> $request->option_2,
                'option_3'=> $request->option_3,
                'option_4'=> $request->option_4
            ));
            $exam_question->status = 1;

            $exam_question->save();
            $notification=array(
                'message'=>'Question has been added',
                'alert-type'=>'success'
                 );
            return redirect()->back()->with($notification);
    }


    public function editQuestion(Oex_question $question){
        $options=json_decode($question->options,true);
        return view('teacher.edit-question',compact('question','options'));
    }


    public function updateQuestion(Oex_question $question, Request $request){
        $validateData = $request->validate([
            'question' => 'required',
            'option_1'=> 'required',
            'option_2'=> 'required',
            'option_3'=> 'required',
            'option_4'=> 'required',
            'ans' => 'required',
           ]);
           $question->options =  json_encode(array(
            'option_1'=> $request->option_1,
            'option_2'=> $request->option_2,
            'option_3'=> $request->option_3,
            'option_4'=> $request->option_4
            ));
            // $question->status = $request->status;
            // dd($question);
            $question->update($request->all());
            $notification=array(
                'message'=>'Question has been updated',
                'alert-type'=>'success'
                 );
            return redirect()->route('add-exam-question',$question->exam_id)->with($notification);
    }


    public function deleteQuestion(Oex_question $question){

        $question->delete();
        $notification=array(
            'message'=>'Question has been deleted',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);

    }

    public function addCourseMaterial()
    {
        $assignedCoursesToInstructor = AssignCourse::join('oex_exam_masters','assign_courses.course_id','=','oex_exam_masters.id')
        ->select(['assign_courses.*','oex_exam_masters.*'])
        ->where('instructor_name',auth()->user()->name)->get();

        return view('teacher.add-course-material',compact('assignedCoursesToInstructor'));

    }
    public function uploadCourseMaterial(Request $request){
			$vadiation = $request->validate([
				'category' => ['required','max:55'],
				'file_name' => ['required'],
			]);
			if($vadiation){
				$exam = Oex_exam_master::findOrFail((int)$request->category);
				$uuid = (string)Uuid::generate();
				$data =  $request->file_name->getClientOriginalName();
				$request->file_name->storeAs('materials',$data);
				$exam->file = $data;
				$exam->update();
			}
			$notification=array(
				'message'=>'Course Material added successfully',
				'alert-type'=>'success'
			);
			return redirect()->back()->with($notification);


		}
		public function deleteFile($examId){
    	$exam = Oex_exam_master::findOrFail($examId);
    	$exam->file = null;
    	$exam->update();
			$notification=array(
				'message'=>'Course Material deleted successfully',
				'alert-type'=>'success'
			);
			return redirect()->back()->with($notification);
		}

	public function download($uuid)
	{
		$book = Oex_exam_master::where('file', $uuid)->firstOrFail();
		$pathToFile = storage_path('app/materials/' . $book->file);
		return response()->download($pathToFile);
	}

    public function manageStudent()
    {
    		$user = User::findOrFail(auth()->user()->id);
    		$assignCourses = AssignCourse::where('instructor_name',$user->name)->get();
    		$examId = [];
    		foreach ($assignCourses as $course) array_push($examId,(int)$course->course_id);
    		/*dd($examId);*/
        $exams = Oex_exam_master::orderBy('id','desc')
            ->where('status','1')
            ->get();
        $students = Oex_student::orderBy('id','desc')
            ->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
            ->select('oex_students.*','oex_exam_masters.title as exam_name')
						->whereIn('oex_students.exam',$examId)
            ->get();
        //dd($students);
        return view('teacher.student-result',compact('exams','students'));
    }
}
