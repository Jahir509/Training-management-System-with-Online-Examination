<?php

namespace App\Http\Controllers;

use Session;
use App\Oex_portal;
use App\Oex_result;
use App\Oex_student;
use App\Oex_question;
use App\Oex_exam_master;
use Illuminate\Http\Request;

class PortalOperationController extends Controller
{
    //

    public function _construct(){
        getSession();
    }
    public function getSession(){
       
         
    }
    public function portalHome()
    {
        if(!Session::get('portal_session')) 
        {
            return redirect()->route('portal.login');
        }
        $user_id = Session::get('portal_session');
        $student = Oex_portal::findOrFail($user_id);
        $portalExams = Oex_student::join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
                                    ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
                                    ->select('oex_students.*','oex_exam_masters.title as exam_title','oex_exam_masters.id as exam_id','oex_exam_masters.exam_date as exam_date','oex_categories.name as exam_category','oex_categories.field as exam_department')
                                    ->where('email',$student->email)->get();

        $sessionData = Session::get('portal_session');
        $user = Oex_portal::findOrFail($sessionData);
        return view('portal.home',compact('user','portalExams'));
    }

    public function portalExamInfo(Oex_exam_master $exam)
    {
        if(!Session::get('portal_session')) 
        {
            return redirect()->route('portal.login');
        }
        $sessionData = Session::get('portal_session');
        $user = Oex_portal::findOrFail($sessionData);
       return view('portal.exam-info',compact('exam','user'));
    }

    public function storeStudenExamInfo(Request $request)
    {

        $sessionData = Session::get('portal_session');
        $user = Oex_portal::findOrFail($sessionData);
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => ['required','max:11'],
            'dob' => 'required',
            'exam' => 'required',
            'password' => 'required'
        ]);

       
        $student = new Oex_student();

        $student->name = $request->name ;
        $student->email = $request->email ;
        $student->mobile_no = $request->mobile_no ;
        $student->dob = $request->dob ;
        $student->exam = $request->exam ;
        $student->password = $request->password ;
        $student->status = 1 ;

       


        if($student->password != $user->password){
            $notification=array(
                'message'=>'Password mismatch',
                'alert-type'=>'error'
                );
            return redirect()->back()->with($notification);
        }
        
        else
        {
            $student->save();
            $notification=array(
                'message'=>'You have been registered successfully',
                'alert-type'=>'success'
                );
            return redirect()->route('portal.print-accessCard',$student)->with($notification);
        }

    }

    public function printStudenExamInfo(Oex_student $student)
    {
        if(!Session::get('portal_session')) 
        {
            return redirect()->route('portal.login');
        }
        $exam = Oex_exam_master::join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
                                ->select(['oex_exam_masters.*','oex_categories.name as category_name'])
                                ->findOrFail($student->exam);

        return view('portal.print-student-info',compact('student','exam'));
    }

    public function portalExam()
    {
        $user_id = Session::get('portal_session');
        $student = Oex_portal::findOrFail($user_id);
        $student_exams = Oex_student::join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
        ->select('oex_students.*','oex_exam_masters.title as exam_title','oex_exam_masters.id as exam_id','oex_exam_masters.exam_date as exam_date','oex_exam_masters.category as exam_category')
        ->where('email',$student->email)->get();
        return view ('portal.exam',compact('student','student_exams'));
    }

    public function portalJoinExam($exam_id)
    {
        $user_id = Session::get('portal_session');
        $student = Oex_portal::findOrFail($user_id);
        $exam_questions = Oex_question::orderBy('id','asc')->where('exam_id',$exam_id)->get();
        return view ('portal.join-exam',compact('student','exam_questions'));
    }

    public function portalSubmitExam(Request $request){
        
        //result data
        $right_ans = 0;
        $wrong_ans = 0;


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

        $user_id = Session::get('portal_session');
        $get_user = Oex_portal::findOrFail($user_id);
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
        $update_student->update();
        return redirect()->route('portal.view-result',$exam_result);

     
    }
    public function portalViewExamResult($exam_result)
    {
        $result = Oex_result::findOrFail($exam_result);
        return view('portal.view-result',compact('result'));
        //echo($exam_result);
    }
    
}
