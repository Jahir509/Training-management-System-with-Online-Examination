<?php

namespace App\Http\Controllers;

use App\Oex_portal;
use Illuminate\Http\Request;
use Session;

class PortalController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:student');
    }

    public function signupPortalUser()
    {
        if(Session::get('portal_session')){
            return redirect()->route('portal.home');
        }
        return view('portal.signup');
    }

    public function registerPortalUser(Request $request)
    {
        $validateData = $request->validate([
            'name' =>'required' ,
            'email' =>['required','unique:oex_portals'] ,
            'mobile_no' =>['required','unique:oex_portals','max:11'] ,
            'password' =>'required'
        ]);

        $portal = new Oex_portal();
        
        $portal->name = $request->name ;
        $portal->email = $request->email ;
        $portal->mobile_no = $request->mobile_no ;
        $portal->password = $request->password ;
        $portal->status = 1;

        $portal->save();

        $notification=array(
            'message'=>'User has been registered successfully',
            'alert-type'=>'success'
             );

        return redirect()->route('portal.login')->with($notification);
    }

    public function loginPortalUser()
    {
        if(Session::get('portal_session')){
            return redirect()->route('portal.home');
        }
        return view('portal.login');
    }

    public function signedInPortalUser(Request $request)
    {
        $user = Oex_portal::where('email',$request->email)
                             ->where('password',$request->password)
                             ->get()
                             ->toArray();
        if($user)
        {
            if($user[0]['status'] == 1 )
            {
                $request->session()->put('portal_session',$user[0]['id']);
                $notification=array(
                    'message'=>'Welcome '.$user[0]['name'],
                    'alert-type'=>'success'
                     );
                     return redirect()->route('portal.home')->with($notification);
            }
           else
           {
            $notification=array(
                'message'=>'Your account is Deactivated',
                'alert-type'=>'warning'
                 );
                 return redirect()->back()->with($notification);
                 
           }
            
        }
        else
        {
            $notification=array(
                'message'=>'User not found',
                'alert-type'=>'error'
                 );
                 return redirect()->back()->with($notification);

        }
    }


    public function logoutPortalUser(Request $request){
       $request->session()->forget('portal_session');
       $notification=array(
        'message'=>'User has been logout successfully',
        'alert-type'=>'success'
         );

    return redirect()->route('portal.login')->with($notification);

    }


}
