<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    //
    public function login()
    {
        return view('teacher.pages.teacher.login');
    }


    public function loginSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                
                'email'=>'required|email',
                'password'=>'required|min:6'
               
                
                
            ],
            [
            
                'email.required'=>'Email is required',
                'password.required'=>'Password is required',
                'password.min'=>'Password have to be atleast 6 character',
              
            ]
        );

        $check= Teacher::where('email',$request->email)->first();
                            
        if($check!=null)
        {
            if($request->password == $check->password)
            {
                session()->put('teacher.email',$check->email);
                session()->put('teacher.name',$check->name);


              

                return redirect()->route('teacher.dashboard');

            }
            return redirect()->back()->withErrors(['errors_password' => 'Wrong password']);
            
        }
        return redirect()->back()->withErrors(['errors_email' => 'Email not found']);
    }


    public function dashboard()
    {
        return view('teacher.layout.dashboard');
    }

    public function signout()
    {
        session()->flush();

        return redirect()->route('teacher.login');
    }


    
    public function changepassword()
    {
        return view('teacher.pages.teacher.changepassword');
    }

    public function changepasswordSubmit(Request $request)
    {
        
        $this->validate(
            $request,
            [
                'ir_password'=>'required|min:6',
                'i_password'=>'required|min:6',
                'ic_password'=>'required|same:i_password'
                
                
            ],
            [
                'ir_password.required'=>'Password is required',
                'ir_password.min'=>'Password have to be atleast 6 character',
                'i_password.required'=>'Password is required',
                'i_password.min'=>'Password have to be atleast 6 character',
                'ic_password.required'=>'Confirm password is required',
                'ic_password.same'=>'Password and Current password must be same'
              
            ]
        );

        $check= Teacher::where('email',session()->get('teacher.email'))->first();

        
                            
        if($check!=null)
        {
            if($request->ir_password== $check->password)
            {
                
                Teacher::where('email',session()->get('teacher.email'))
                                ->update(['password'=> $request->i_password]);

              

                 session()->flush();

                return redirect()->route('teacher.login');

            }
            return redirect()->back()->withErrors(['errors_irpassword' => 'Wrong password']);
            
        }
        return redirect()->route('teacher.login');
    }


    public function changeinformation()
    {
        $entity= Teacher::where('email',session()->get('teacher.email'))->first();

        return view('teacher.pages.teacher.changeinformation')->with('entity',$entity);
    }

    public function changeinformationSubmit(Request $request)
    {
         Teacher::where('email',session()->get('teacher.email'))
                    ->update(['name'=> $request->name,'phone'=> $request->phone,'address'=> $request->address]);

        session()->forget('teacher.name');
        session()->put('teacher.name',$request->name);

         return redirect()->route('teacher.dashboard');
    }
}
