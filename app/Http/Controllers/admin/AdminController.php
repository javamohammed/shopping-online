<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function settings()
    {
        $adminDetails = Admin::Where('email', \Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_settings')->with(compact('adminDetails'));
    }

    public function checkCurrentPwd(Request $request)
    {
        $data  = $request->all();
        return \Hash::check($data['current_password'], \Auth::guard('admin')->user()->password) ? "true" : "false";
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){

            $data = $request->all();
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
            $customMessages = [
                'email.required' => 'Email is Required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required'
            ];
            $this->validate($request, $rules, $customMessages);

            //dd($data);
            
            if (\Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'] ])) {
                return \redirect('admin/dashboard');
            }else{
                \Session::flash('error_message', 'Invalid Email or Password');
                return \redirect()->back();
            }
        }
        //dd(\Hash::make("12345678"));
        return view('admin.admin_login');
    }

    function logout()
    {
        \Auth::guard('admin')->logout();
       return  \redirect('/admin');
    }

}
