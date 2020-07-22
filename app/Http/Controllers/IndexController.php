<?php

namespace App\Http\Controllers;

use App\Event;
use App\Teacher;
use App\Workshop;
use App\Instructor;
use App\Oex_exam_master;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function Index()
    {
        $courses = Oex_exam_master::orderBy('title','asc')
                                    ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
                                    ->select(['oex_exam_masters.*',
                                            'oex_categories.name as category_name',
                                            'oex_categories.field as category_field',
                                            'oex_categories.created_at as category_created_at'])
                                    ->take(3)
                                    ->get();
        // $courses = $courses_all->slice($n,1)->first();
        return view('welcome',compact('courses'));
    }
    

    public function showAllCourse(){
        $courses = Oex_exam_master::orderBy('title','asc')
                                    ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
                                    ->select(['oex_exam_masters.*',
                                            'oex_categories.name as category_name',
                                            'oex_categories.field as category_field',
                                            'oex_categories.created_at as category_created_at'])
                                    ->get();
        // $courses = $courses_all->slice($n,1)->first();
        return view('frontend.courses',compact('courses'));
    }

    public function showCourse($id)
    {
        $findCourse = Oex_exam_master::where('id',$id)->get()->first();
        $course = Oex_exam_master::orderBy('title','asc')
        ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
        ->select(['oex_exam_masters.*',
                'oex_categories.name as category_name',
                'oex_categories.field as category_field',
                'oex_categories.created_at as category_created_at'])
        ->where('oex_exam_masters.id',$findCourse->id)
        ->get();
        return view('frontend.show-course',compact('course'));
        // echo($course);
    }
    

    public function about(){
        return view('frontend.about');
    }
    public function events(){
        $events = Event::orderBy('id','desc')->where('status','1')->get();
        return view('frontend.events',compact('events'));
    }
    public function showEvent(Event $event){
        return view('frontend.show-event',compact('event'));
    }
    public function blog(){
        return view('frontend.blog');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function workshops(){
        $workshops = Workshop::orderBy('id','desc')->where('status','1')->get();
        return view('frontend.workshops',compact('workshops'));
    }
    public function showWorkshop(Workshop $workshop){
        return view('frontend.show-workshop',compact('workshop'));
    }
    public function teachers(){
        $instuctors = Teacher::orderBy('name','asc')->get();
        return view('frontend.teachers',compact('instuctors'));
    }

}
