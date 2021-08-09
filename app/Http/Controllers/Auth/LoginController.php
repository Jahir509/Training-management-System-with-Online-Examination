<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticated(Request $reuqest, $user)
    {
        if($user->hasRole('admin')){
            return redirect('/admin');
        }
        
        if($user->hasRole('teacher')){
            return redirect('/teacher');
        }
        
        if($user->hasRole('student')){
            return redirect('/student');
        }
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:teacher')->except('logout');
        // $this->middleware('guest:student')->except('logout');

    }


    // // This is for Teacher Login
    // public function showTeacherLoginForm(){
    //     return view('auth.login',['url' => 'teacher']);
    // }
    // public function teacherLogin(Request $request){
    //     $this->validate($request,[
    //         'email' =>'required|email',
    //         'password'=>'required|min:8'
    //     ]);

    //     if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         return redirect()->intended('/teacher');
    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }


    //  // This is for Student Login
    //  public function showStudentLoginForm(){
    //     return view('auth.login',['url' => 'student']);
    // }
    // public function studentLogin(Request $request){
    //     $this->validate($request,[
    //         'email' =>'required|email',
    //         'password'=>'required|min:8'
    //     ]);

    //     if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         $notification=array(
    //             'message'=>'Welcome',
    //             'alert-type'=>'success'
    //              );
    //         return redirect()->intended('/student');
    //     }
    //     $notification=array(
    //         'message'=>'Incorrect Credentials',
    //         'alert-type'=>'error'
    //          );
    //     return back()->withInput($request->only('email', 'remember'));
    // }
    
}
