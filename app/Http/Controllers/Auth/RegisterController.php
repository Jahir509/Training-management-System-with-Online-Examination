<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('guest:teacher');
        // $this->middleware('guest:student');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if($data['is_teacher'] == 'true')
        {
            $user->attachRole('teacher');
            $teacher = new Teacher();
            $teacher->name =  $data['name'];
            $teacher->email =  $data['email'];
            $teacher->password = Hash::make($data['password']);
            $teacher->status = 1;

            $teacher->save();
        }
        else
        {
            $user->attachRole('student');
        }
        
        return $user;
    }



    // // This is for Teacher Register
    // public function showTeacherRegisterForm()
    // {
    //     return view('auth.register', ['url' => 'teacher']);
    // }

    // protected function createTeacher(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     $teacher = Teacher::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //     ]);
    //     return redirect()->intended('login/teacher');
    // }

    // // This is for Student Register
    // public function showStudentRegisterForm()
    // {
    //     return view('auth.register', ['url' => 'student']);
    // }

    // protected function createStudent(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     $student = Student::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //     ]);
    //     return redirect()->intended('login/student');
    // }

}
