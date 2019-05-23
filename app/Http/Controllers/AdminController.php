<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lecture_Research;
use App\Lecture_qt;
use App\Department_User;
use App\User;
use App\Reseach_Field;
use App\User_Research;
use App\User_Lecture;
use DB;

class AdminController extends Controller
{
    // login
    public function getLoginAdmin(){
    	return view('admin.page.login');
    }

    public function postLogin(Request $request){    
           $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:6',
                
            ],
            [
                'email.required'=>'Vui lòng nhập email!',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
            ]
        );
        
        $user = array('email'=>$request->email, 'password'=>$request->password, 'role'=>$request->role);
        if(Auth::attempt($user)){
            return redirect('/listteacher');
        }

        else{
            return redirect('/admin/login')->with('message','Đăng Nhập thất bại');
        }
        
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/admin/login');
    }

    public function getQuanLyDonVi(){
    	return view('admin.page.quanlydonvi');
    }

    public function getListteacher(){
    	return view('admin.page.listteacher');
    }
}
