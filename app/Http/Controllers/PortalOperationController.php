<?php

namespace App\Http\Controllers;

use Session;
use App\Oex_portal;
use App\Oex_student;
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
        $portalExams = Oex_exam_master::orderBy('id','desc')
                                      ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
                                      ->select(['oex_exam_masters.*','oex_categories.name as category_name'])
                                      ->where('oex_exam_masters.status','1')
                                      ->get(); 

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
    
}
