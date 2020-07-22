<?php

namespace App\Http\Controllers;

use App\AssignCourse;
use App\Oex_question;
use App\Oex_exam_master;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:teacher');
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
        ->select(['assign_courses.*','oex_exam_masters.title as name'])
        ->where('instructor_name',auth()->user()->name)->get();

        return view('teacher.add-course-material',compact('assignedCoursesToInstructor'));

    }
}
