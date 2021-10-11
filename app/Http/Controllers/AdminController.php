<?php

namespace App\Http\Controllers;

use App\Role_User;
use Image;
use App\User;
use App\Event;
use App\Degree;
use App\Teacher;
use App\Student;
use App\Workshop;
use App\Instructor;
use App\Oex_portal;
use App\Oex_student;
use App\AssignCourse;
use App\Oex_category;
use App\Oex_question;

use App\Oex_exam_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $categoryCount = Degree::count();
        $courseCount = Oex_exam_master::count();
        $instructorCount = Teacher::count();
        $workshopCount = Workshop::count();
        $studentCount = Student::count();
        //dd($studentCount);
        return view('admin.dashboard',compact('categoryCount','courseCount','instructorCount','workshopCount','studentCount'));
    }

    // public function examCategory()
    // {
    //     $degrees = Degree::orderBy('name','asc')->get();
    //     $categories = Oex_category::orderBy('name','asc')->get();
    //     return view('admin.exam-category',compact('categories','degrees'));
    // }
    // public function examCategoryStore(Request $request)
    // {
    //     $validateData=$request->validate([
    //         'name' => ['required','unique:oex_categories','max:55'],
    //     ]);

    //     $category = new Oex_category();
    //     $category->name = $request->name;
    //     $category->field = $request->field;
    //     $category->status = 1 ;

    //     $category->save();
    //     $notification=array(
    //         'message'=>'Category has been added successfully',
    //         'alert-type'=>'success'
    //          );

    //     return redirect()->back()->with($notification);

    // }

    // public function examCategoryDelete(Oex_category $category)
    // {
    //     $category->delete();
    //     $notification=array(
    //         'message'=>'Category has been deleted successfully',
    //         'alert-type'=>'error'
    //          );

    //     return redirect()->back()->with($notification);
    // }

    // public function examCategoryEdit(Oex_category $category)
    // {
    //     $degrees = Degree::orderBy('name','asc')->get();
    //     return view('admin.exam-category-edit',compact('category','degrees'));
    // }

    // public function examCategoryUpdate(Oex_category $category,Request $request)
    // {
    //     $validateData=$request->validate([
    //         'name' => ['required','max:55']
    //     ]);

    //     $category->update($request->all());
    //     $notification=array(
    //         'message'=>'Category has been updated successfully',
    //         'alert-type'=>'success'
    //          );

    //     return redirect()->route('admin.exam-category')->with($notification);
    // }

    public function manageExam()
    {
        $exams = Oex_exam_master::orderBy('id','desc')
                    ->get();
        return view('admin.manage-exam.index',compact('exams'));
    }

    public function storeExam(Request $request)
    {
        $validateData = $request->validate([
            'title' => ['required','max:55'],
            'details' => ['required','max:350'],
            'category' =>'required',
            'exam_date' => 'required',
            'image'=>'required'
        ]);

        $exam = new Oex_exam_master();

        $exam->title = $request->title ;
        $exam->details = $request->details;
        $exam->exam_date = $request->exam_date ;
        $exam->category = $request->category ;
        $exam->status = 1 ;

        $banner_image = $request->image;

       if($banner_image)
       {
           $imagePath=public_path('media/courses/');
           $imageName = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
           Image::make($banner_image)->resize(371,308)->save($imagePath.$imageName);
           $exam->image = $imageName;
       }

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
            'title' => ['required','max:55'],
            'details' => ['required','max:350'],
            'category' =>'required',
            'exam_date' => 'required',
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









    public function showStudent()
    {

        $students = Student::orderBy('id','desc')
                        ->get();
        return view('admin.manage-student.show',compact('students'));
    }

    public function saveStudent(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required','max:255'],
            'email' =>['required','unique:oex_students','max:255'],
            'password' => ['required','max:255']
        ]);

        $user = new User();
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password) ;

        $user->save();
        $role_user = new Role_User();
        $role_user->role_id = 3;
        $role_user->user_id = $user->id;
        $role_user->user_type = 'App\User';
        $role_user->save();


        $student = new Student();

        $student->name = $request->name ;
        $student->email = $request->email ;
        $student->password = Hash::make($request->password) ;
        $student->save();
        $notification=array(
            'message'=>'Student has been addedd successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }

    public function delStudent($student)
    {
        $data = Student::where('id',$student)->first();

        Student::where('id',$data->id)->delete();
        $userData = User::where('email',$data->email)->first();
        User::where('email',$data->email)->delete();
        Oex_student::where('email',$data->email)->delete();
        Role_User::where('user_id',$userData->id)->delete();
        $notification=array(
            'message'=>'Student has been deleted successfully',
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

        // User
        $user = new User();
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = Hash::make($request->password) ;

        $user->save();
        //Role_Id
        $role_user = new Role_User();
        $role_user->role_id = 3;
        $role_user->user_id = $user->id;
        $role_user->user_type = 'App\User';
        $role_user->save();

        //Student

        $student = new Student();

        $student->name = $request->name ;
        $student->email = $request->email ;
        $student->password = Hash::make($request->password) ;
        $student->save();
        // Oex_student
        $student = new Oex_student();

        $student->name = $request->name ;
        $student->email = $request->email ;
        $student->mobile_no = $request->mobile_no ;
        $student->dob = $request->dob ;
        $student->exam = $request->exam ;
        $student->password = Hash::make($request->password) ;
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
        //dd($request);
        $vadiation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dob' => ['required','max:255'],
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
        $teachers = Teacher::orderBy('id','desc')->get();
        return view('admin.manage-instructor.index',compact('teachers','degrees'));
    }

    public function storeInstructor(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required','max:55'],
            'email' =>['required','unique:teachers','max:255'],
            'mobile_no' => ['required','unique:teachers','max:11'],
            'field' => 'required',
            'image' => 'required',
            'password' => ['required','max:255']
        ]);

        $teacher = new Teacher();

        $teacher->name = $request->name ;
        $teacher->email = $request->email ;
        $teacher->mobile_no = $request->mobile_no ;
        $teacher->field = $request->field ;
        $hashPassword = Hash::make($request->password);
        $teacher->password = $hashPassword;
        $teacher->status = 1 ;

        $teacher_image = $request->image;

       if($teacher_image)
       {
           $imagePath=public_path('media/teachers/');
           $imageName = hexdec(uniqid()).'.'.$teacher_image->getClientOriginalExtension();
           Image::make($teacher_image)->resize(371,418)->save($imagePath.$imageName);
           $teacher->image = $imageName;
       }

        $teacher->save();

        $user = new User();
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password = $hashPassword;
        $user->save();


        $notification=array(
            'message'=>'Teacher has been addedd successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);

    }

    public function editInstructor(Teacher $teacher)
    {
        $degrees = Degree::orderBy('id','asc')->get();
        return view('admin.manage-instructor.edit',compact('teacher','degrees'));

    }

    public function updateInstructor(Teacher $teacher,Request $request)
    {
        $vadiation = $request->validate([
            'name' => ['required','max:55'],
            'email' =>['required','max:255'],
            'mobile_no' => ['required','max:11'],
        ]);

        $user = User::where('email',$teacher->email)->first();
        $user->name = $request->name ;
        $user->email = $request->email ;
        $hashPassword = Hash::make($request->password);
        $user->password = $hashPassword ;

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->mobile_no = $request->mobile_no;
        $teacher->status = $request->status;
        $teacher->password = $hashPassword;


        // echo( $request->email.'Request'.$request->password .'<br> User'.$user->password.'<br>'.'Teacher:'.$teacher->password.'<br>');


        $user->update();
        $teacher->update();
        $notification=array(
            'message'=>'teacher has been updated successfully',
            'alert-type'=>'success'
             );
        return redirect()->route('admin.manage-instructor')->with($notification);

    }

    public function deleteInstructor(Teacher $teacher)
    {

        $user = User::where('email',$teacher->email)->first();
        $user->delete();
        $teacher->delete();
        $notification=array(
            'message'=>'Teacher has been deleted successfully',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
    }

    public function assignCourseToInstructor(Teacher $teacher)
    {
        $courses = Oex_exam_master::orderBy('id','asc')
        ->get();
        $assignedCoursesToInstructor = AssignCourse::join('oex_exam_masters','assign_courses.course_id','=','oex_exam_masters.id')
                                                    ->select(['assign_courses.*','oex_exam_masters.title as name'])
                                                    ->where('instructor_name',$teacher->name)->get();
        return view('admin.manage-instructor.assign-course',compact('courses','teacher','assignedCoursesToInstructor'));
    }

    public function assignInstructor(Teacher $teacher,Request $request)
    {
        $isCourseAssigned = AssignCourse::where('instructor_name',$request->name)->where('course_id',$request->course_id)->exists();
        $isCourseAssignedToOther = AssignCourse::where('course_id',$request->course_id)->exists();
        if($isCourseAssigned == 1){
            $notification=array(
                'message'=>'Course has already assigned',
                'alert-type'=>'error'
                 );
            return redirect()->back()->with($notification);
        }
        else{
        		if($isCourseAssignedToOther == 1){
							$notification=array(
								'message'=>'Course assigned to another instructor',
								'alert-type'=>'error'
							);
							return redirect()->back()->with($notification);
						}
            $course = new AssignCourse();
            $course->instructor_name = $teacher->name;
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
    public function deleteAssignedCourse(AssignCourse $course)
    {
        $course->delete();
        $notification=array(
            'message'=>'Course has been unassigned successfully',
            'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
    }


    public function showAllEvent()
    {
        $events = Event::orderBy('id','desc')->get();
        return view('admin.event.index',compact('events'));
    }

    public function storeEvent(Request $request)
    {
       $validateData = $request->validate([
        'title' => 'required',
        'place' => 'required',
        'time' => 'required',
        'date' => 'required',
        'details' => 'required',
        'contact_phone' => 'required',
        'contact_email' => 'required',

       ]);


       $event = new Event();
       $event->title = $request->title;
       $event->place = $request->place;
       $event->time = $request->time;
       $event->date = $request->date;
       $event->details = $request->details;
       $event->contact_phone = $request->contact_phone;
       $event->contact_email = $request->contact_email;
       $event->status = 1;

       $banner_image = $request->image;

       if($banner_image)
       {
           $imagePath=public_path('media/events/');
           $imageName = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
           Image::make($banner_image)->resize(1160.580)->save($imagePath.$imageName);
           $event->image = $imageName;
       }


       $event->save();
       $notification=array(
        'message'=>'Event has been added successfully',
        'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
    public function showEvent(Event $event)
    {
        return view('admin.event.show',compact('event'));
    }
    public function editEvent(Event $event)
    {
        return view('admin.event.edit',compact('event'));
    }
    public function deleteEvent(Event $event)
    {
        $event->delete();
        $notification=array(
            'message'=>'Event has been deleted successfully',
            'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);

    }
    public function updateEvent(Event $event, Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'place' => 'required',
            'time' => 'required',
            'date' => 'required',
            'details' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',

           ]);


           $event->title = $request->title;
           $event->place = $request->place;
           $event->time = $request->time;
           $event->date = $request->date;
           $event->details = $request->details;
           $event->contact_phone = $request->contact_phone;
           $event->contact_email = $request->contact_email;
           $event->status = $request->status;

        //    $banner_image = $request->image;

        //    if($banner_image)
        //    {
        //        $imagePath=public_path('media/events/');
        //        $imageName = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
        //        Image::make($banner_image)->resize(1160.580)->save($imagePath.$imageName);
        //        $event->image = $imageName;
        //    }
        //    dd($request->all());

           $event->update($request->all());
           $notification=array(
            'message'=>'Event has been added successfully',
            'alert-type'=>'success'
            );
            return redirect()->route('admin.show-event')->with($notification);
    }




    public function showAllWorkshop()
    {
        $workshops = Workshop::orderBy('id','desc')->get();
        return view('admin.workshop.index',compact('workshops'));
    }

    public function storeWorkshop(Request $request)
    {
       $validateData = $request->validate([
        'title' => 'required',
        'place' => 'required',
        'time' => 'required',
        'date' => 'required',
        'details' => 'required',
        'contact_phone' => 'required',
        'contact_email' => 'required',

       ]);


       $workshop = new Workshop();
       $workshop->title = $request->title;
       $workshop->place = $request->place;
       $workshop->time = $request->time;
       $workshop->date = $request->date;
       $workshop->details = $request->details;
       $workshop->contact_phone = $request->contact_phone;
       $workshop->contact_email = $request->contact_email;
       $workshop->status = 1;

       $banner_image = $request->image;

       if($banner_image)
       {
           $imagePath=public_path('media/workshops/');
           $imageName = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
           Image::make($banner_image)->resize(1160.580)->save($imagePath.$imageName);
           $workshop->image = $imageName;
       }


       $workshop->save();
       $notification=array(
        'message'=>'workshop has been added successfully',
        'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
    public function showWorkshop(Workshop $workshop)
    {
        return view('admin.workshop.show',compact('workshop'));
    }
    public function editWorkshop(Workshop $workshop)
    {
        return view('admin.workshop.edit',compact('workshop'));
    }
    public function deleteWorkshop(Workshop $workshop)
    {
        $workshop->delete();
        $notification=array(
            'message'=>'workshop has been deleted successfully',
            'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);

    }
    public function updateWorkshop(Workshop $workshop, Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'place' => 'required',
            'time' => 'required',
            'date' => 'required',
            'details' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',

           ]);


           $workshop->title = $request->title;
           $workshop->place = $request->place;
           $workshop->time = $request->time;
           $workshop->date = $request->date;
           $workshop->details = $request->details;
           $workshop->contact_phone = $request->contact_phone;
           $workshop->contact_email = $request->contact_email;
           $workshop->status = $request->status;

        //    $banner_image = $request->image;

        //    if($banner_image)
        //    {
        //        $imagePath=public_path('media/workshops/');
        //        $imageName = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
        //        Image::make($banner_image)->resize(1160.580)->save($imagePath.$imageName);
        //        $workshop->image = $imageName;
        //    }
        //    dd($request->all());

           $workshop->update($request->all());
           $notification=array(
            'message'=>'workshop has been added successfully',
            'alert-type'=>'success'
            );
            return redirect()->route('admin.show-workshop')->with($notification);
    }


}
