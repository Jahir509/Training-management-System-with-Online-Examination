<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Instructor;
use App\Oex_portal;
use App\Oex_student;
use App\AssignCourse;
use App\Oex_category;
use App\Oex_question;
use App\Oex_exam_master;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('admin.dashboard');
    }

    public function examCategory()
    {
        $degrees = Degree::orderBy('name','asc')->get();
        $categories = Oex_category::orderBy('name','asc')->get();
        return view('admin.exam-category',compact('categories','degrees'));
    }
    public function examCategoryStore(Request $request)
    {
        $validateData=$request->validate([
            'name' => ['required','unique:oex_categories','max:55']
        ]);

        $category = new Oex_category();
        $category->name = $request->name;
        $category->field = $request->field;
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
        $degrees = Degree::orderBy('name','asc')->get();
        return view('admin.exam-category-edit',compact('category','degrees'));
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

    public function manageExamQuestion(Oex_exam_master $exam)
    {
        $questions = Oex_question::orderBy('id','asc')->where('exam_id',$exam->id)->get();
        return view ('admin.manage-exam.add-question',compact('exam','questions'));
    }
    public function storeExamQuestion(Request $request)
    {
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


    public function editExamQuestion(Oex_question $question)
    {
        $options=json_decode($question->options,true);
        //dd($a['option_1']);
        return view('admin.manage-exam.edit-question',compact('question','options'));

    }


    public function updateExamQuestion(Oex_question $question, Request $request)
    {
       // return 
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
        return redirect()->route('manage-exam.question',$question->exam_id)->with($notification);
       
    }


    public function deleteExamQuestion(Oex_question $question)
    {
        $question->delete();
        $notification=array(
            'message'=>'Question has been deleted',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
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




    public function manageInstructor()
    {
        $degrees = Degree::orderBy('id','asc')->get();
        $instructors = Instructor::orderBy('id','desc')->get();
        return view('admin.manage-instructor.index',compact('instructors','degrees'));
    }

    public function storeInstructor(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required','max:255'],
            'email' =>['required','unique:instructors','max:255'],
            'mobile_no' => ['required','unique:instructors','max:11'],
            'field' => 'required',
            'password' => ['required','max:255']
        ]);

        $instructor = new Instructor();

        $instructor->name = $request->name ;
        $instructor->email = $request->email ;
        $instructor->mobile_no = $request->mobile_no ;
        $instructor->field = $request->field ;
        $instructor->password = $request->password ;
        $instructor->status = 1 ;
        
        $instructor->save();
        $notification=array(
            'message'=>'Instructor has been addedd successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
        
    }

    public function editInstructor(Instructor $instructor)
    {
        $degrees = Degree::orderBy('id','asc')->get();
        return view('admin.manage-instructor.edit',compact('instructor','degrees'));      
    }

    public function updateInstructor(Instructor $instructor,Request $request)
    {
        $vadiation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => ['required','max:11'],
        ]);

        $instructor->update($request->all());
        $notification=array(
            'message'=>'Instructor has been updated successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('admin.manage-instructor')->with($notification);

    }

    public function deleteInstructor(Instructor $instructor)
    {
        $instructor->delete();
        $notification=array(
            'message'=>'Instructor has been deleted successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }

    public function assignCourseToInstructor(Instructor $instructor)
    {
        $courses = Oex_exam_master::orderBy('id','asc')
        ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
        ->select(['oex_exam_masters.*','oex_categories.name as category_name','oex_categories.field as field'])
        ->where('oex_categories.field',$instructor->field)
        ->get();
        $assignedCoursesToInstructor = AssignCourse::join('oex_exam_masters','assign_courses.course_id','=','oex_exam_masters.id')
                                                    ->select(['assign_courses.*','oex_exam_masters.title as name'])
                                                    ->where('instructor_name',$instructor->name)->get();
        return view('admin.manage-instructor.assign-course',compact('courses','instructor','assignedCoursesToInstructor'));
    }

    public function assignInstructor(Instructor $instructor,Request $request)
    {
        $isCourseAssigned = AssignCourse::where('instructor_name',$request->name)->where('course_id',$request->course_id)->exists();
        if($isCourseAssigned == 1){
            $notification=array(
                'message'=>'Course has already assigned',
                'alert-type'=>'error'
                 );
            return redirect()->back()->with($notification);
        }
        else{
            $course = new AssignCourse();
            $course->instructor_name = $instructor->name;
            $course->course_id = $request->course_id;

            $course->save();
            $notification=array(
                'message'=>'Course has been assigned successfully',
                'alert-type'=>'success'
                );
            return redirect()->back()->with($notification);
        
        }
       
        //  die($course);
        //dd($request->all());
    }

}
