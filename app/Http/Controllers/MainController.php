<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request){
        
        //validate request
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12',
            'cpassword'=>'required|min:5|max:12'
        ]);

        //Insert data into database
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->cpassword = Hash::make($request->cpassword);
        $save = $admin->save();

        //Data is not Insert into database show message
        if($save){
            return back()->with('success','New User has been successfuly added to database');
        }else{
            return back()->with('fail','Something went wrong,try again later');
        }
    }

    public function check(Request $request){
        //Validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        //Login info for database use model

        $userInfo = Admin::where('email','=',$request->email)->first();
        
        //No user found in admin table show error

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{

            //check password

            if(Hash::check($request->password,$userInfo->password)){
                //Password is correct store user id session

                $request->session()->put('LoggedUser',$userInfo->id);

                // redirect to dashboard

                return redirect('admin/dashboard');
            }else{

                //Password is incorrect show error message

                return back()->with('fail','Incorrect password');
            }
        }
    }

    public function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dashboard',$data);
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('auth/login');
        }
    }

    public function setting(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.setting',$data); 
    }

    public function profile(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.profile',$data); 
    }

    public function staff(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.staff',$data); 
    }
}
