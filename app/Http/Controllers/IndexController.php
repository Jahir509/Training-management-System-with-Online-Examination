<?php

namespace App\Http\Controllers;

use App\Oex_exam_master;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function Index()
    {
        $n=6;
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

    public function about(){
        return view('frontend.about');
    }
    public function events(){
        return view('frontend.events');
    }
    public function blog(){
        return view('frontend.blog');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function workshops(){
        return view('frontend.workshops');
    }
    public function teachers(){
        return view('frontend.teachers');
    }

}
