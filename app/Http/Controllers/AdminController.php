<?php

namespace App\Http\Controllers;

use App\Oex_portal;
use App\Oex_student;
use App\Oex_category;
use App\Oex_exam_master;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {

        return view('admin.dashboard');
    }

    public function examCategory()
    {
        $categories = Oex_category::orderBy('name','asc')->get();
        return view('admin.exam-category',compact('categories'));
    }
    public function examCategoryStore(Request $request)
    {
        $validateData=$request->validate([
            'name' => ['required','unique:oex_categories','max:55']
        ]);

        $category = new Oex_category();
        $category->name = $request->name;
        $category->status = 1 ;

        $category->save();
        $notification=array(
            'message'=>'Category has been added successfully',
            'alert-type'=>'success'
             );
        
        return redirect()->back()->with($notification);

    }

    public function examCategoryDelete(Oex_category $category)
    {
        $category->delete();
        $notification=array(
            'message'=>'Category has been deleted successfully',
            'alert-type'=>'error'
             );
        
        return redirect()->back()->with($notification);
    }

    public function examCategoryEdit(Oex_category $category)
    {
        return view('admin.exam-category-edit',compact('category'));
    }

    public function examCategoryUpdate(Oex_category $category,Request $request)
    {
        $validateData=$request->validate([
            'name' => ['required','max:55']
        ]);
        
        $category->update($request->all());
        $notification=array(
            'message'=>'Category has been updated successfully',
            'alert-type'=>'success'
             );
        
        return redirect()->route('admin.exam-category')->with($notification);
    }

    public function manageExam()
    {
        $categories = Oex_category::orderBy('name','asc')->where('status','1')->get();
        $exams = Oex_exam_master::orderBy('id','desc')
                    ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
                    ->select(['oex_exam_masters.*','oex_categories.name as category_name'])
                    ->get();
        return view('admin.manage-exam.index',compact('categories','exams'));
    }

    public function storeExam(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'category' =>'required',
            'exam_date' => 'required'
        ]);

        $exam = new Oex_exam_master();

        $exam->title = $request->title ;
        $exam->exam_date = $request->exam_date ;
        $exam->category = $request->category ;
        $exam->status = 1 ;
        
        $exam->save();
        $notification=array(
            'message'=>'Exam has been updated successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }

    public function editExam(Oex_exam_master $exam)
    {
        $categories = Oex_category::orderBy('name','asc')->where('status','1')->get();
        return view('admin.manage-exam.edit',compact('categories','exam'));
    }

    public function deleteExam(Oex_exam_master $exam)
    {
        $exam->delete();
        $notification=array(
            'message'=>'Exam has been deleted successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }

    public function updateExam(Oex_exam_master $exam,Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'category' =>'required',
            'exam_date' => 'required'
        ]);

        $exam->update($request->all());
        $notification=array(
            'message'=>'Exam has been updated successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('admin.manage-exam')->with($notification);
    }

    public function manageStudent()
    {
        $exams = Oex_exam_master::orderBy('id','desc')
                    ->where('status','1')
                    ->get();
        $students = Oex_student::orderBy('id','desc')
                        ->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
                        ->select('oex_students.*','oex_exam_masters.title as exam_name')
                        ->get();
        return view('admin.manage-student.index',compact('exams','students'));
    }

    public function storeStudent(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required','max:255'],
            'email' =>['required','unique:oex_students','max:255'],
            'mobile_no' => ['required','unique:oex_students','max:11'],
            'dob' => ['required','max:255'],
            'exam' => ['required','max:255'],
            'password' => ['required','max:255']
        ]);

        $student = new Oex_student();

        $student->name = $request->name ;
        $student->email = $request->email ;
        $student->mobile_no = $request->mobile_no ;
        $student->dob = $request->dob ;
        $student->exam = $request->exam ;
        $student->password = $request->password ;
        $student->status = 1 ;
        
        $student->save();
        $notification=array(
            'message'=>'Student has been addedd successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
        
    }

    public function editStudent(Oex_student $student)
    {
        $exams = Oex_exam_master::orderBy('id','desc')
        ->where('status','1')
        ->get();
        return view('admin.manage-student.edit',compact('student','exams'));
    }

    public function updateStudent(Oex_student $student,Request $request)
    {

        $vadiation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => ['required','max:11'],
        ]);

        $student->update($request->all());
        $notification=array(
            'message'=>'Student has been updated successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('admin.manage-student')->with($notification);
    }

    public function deleteStudent(Oex_student $student)
    {

        $student->delete();
        $notification=array(
            'message'=>'Student has been deleted successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }
    

    public function managePortal()
    {
        $portals = Oex_portal::orderBy('id','desc')->get();

        return view('admin.manage-portal.index',compact('portals'));
    }

    public function storePortal(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        $portal = new Oex_portal();

        $portal->name = $request->name ;
        $portal->email = $request->email ;
        $portal->mobile_no = $request->mobile_no ;
        $portal->password = $request->password ;
        $portal->status = 1;

        $portal->save();
        $notification=array(
            'message'=>'Portal has been addedd successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);


    }

    public function editPortal(Oex_portal $portal)
    {
        return view('admin.manage-portal.edit',compact('portal'));
    }

    public function updatePortal(Oex_portal $portal,Request $request)
    {

        $vadiation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        $portal->update($request->all());
        $notification=array(
            'message'=>'Portal has been updated successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('admin.manage-portal')->with($notification);
  
    }

    public function deletePortal(Oex_portal $portal)
    {

        $portal->delete();
        $notification=array(
            'message'=>'Portal has been deleted successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }

}
