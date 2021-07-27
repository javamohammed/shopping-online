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
        return view('admin.admin_dashboard',['page' => 'admin_dashboard']);
    }

    public function settings()
    {
        $page = 'update-admin-password';
        $adminDetails = Admin::Where('email', \Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_settings')->with(compact('adminDetails', 'page'));
    }

    public function checkCurrentPwd(Request $request)
    {
        $data  = $request->all();
        return \Hash::check($data['current_password'], \Auth::guard('admin')->user()->password) ? "true" : "false";
    }

    public function updateCurrentPwd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data  = $request->all();
            if (!\Hash::check($data['current_password'], \Auth::guard('admin')->user()->password)) {
                \Session::flash('error_message', 'Your current password is incorrect!!');
                return \redirect()->back();
            }
            if($data['confirm_password'] !=  $data['new_password']){
                \Session::flash('error_message', 'New password and Confirm password not match !!');
                return \redirect()->back();
            }
            Admin::Where('id', \Auth::guard('admin')->user()->id)->update(['password' => \bcrypt($data['new_password'])]);
            \Session::flash('success_message', 'Password has been updated successfully');
            return \redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
           
            $rules = [
                'name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                'mobile' => 'required|numeric',
                'image' => 'image',
            ];
            $customMessages = [
                'name.required' => 'Name is Required',
                'name.alpha' => 'Valid name is required',
                'mobile.required' => 'Mobile is Required',
                'mobile.numeric' => 'Valid Mobile is required',
                'image.image' => 'Valid Image is required',
            ];
            $this->validate($request, $rules, $customMessages);
             //dd($request->hasFile('image'));
             $imageName = "";
             if (!empty($data['current_image']))
             {
                $imageName = $data['current_image'];
             }
             if ($request->hasFile('image')) 
             {
                 $imageTmp = $request->file('image');
                // dd($imageTmp);
                if($imageTmp->isValid())
                {
                    $imageName = rand(111, 99999).'.'.$imageTmp->getClientOriginalName();
                    $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                    \Image::make($imageTmp)->resize(160,160)->save($imagePath);
                    \File::delete('images/admin_images/admin_photos/'.$data['current_image']);
                }
             }
            Admin::Where('id',  \Auth::guard('admin')->user()->id)
                                ->update([  'name' => $data['name'],
                                            'mobile' => $data['mobile'],
                                            'image' => $imageName ]);
            \Session::flash('success_message', 'Admin Details has been updated successfully');
            return \redirect()->back();
        }
        $page = 'update-admin-details';
        $adminDetails = Admin::Where('email', \Auth::guard('admin')->user()->email)->first();
        return view('admin.update_admin_details')->with(compact('adminDetails', 'page'));
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
