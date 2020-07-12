<?php

namespace App\Http\Controllers;

use App\Oex_category;
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
            'name' => ['required','unique:oex_categories','max:55']
        ]);
        
        $category->update($request->all());
        $notification=array(
            'message'=>'Category has been updated successfully',
            'alert-type'=>'success'
             );
        
        return redirect()->route('admin.exam-category')->with($notification);
    }
}
