<?php

namespace App\Http\Controllers;

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
}
