<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lecture_Research;
use App\Lecture_qt;
use App\Department_User;
use App\Department;
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
                'username'=>'required|min:4',
                'password'=>'required|min:6',
                
            ],
            [
                'username.required'=>'Vui lòng nhập Tài Khoản',
                'username.min'=>'Tài Khoản phải có ít nhất 4 ký tự',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
            ]
        );
        
        $user = array('username'=>$request->username, 'password'=>$request->password, 'role'=>$request->role);
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
        $dep = Department::all();
    	return view('admin.page.quanlydonvi', compact('dep'));
    }


    public function getListteacher(){
    	$users = User::where('role', 0)->get();
    	return view('admin.page.listteacher', compact('users'));
    }

    //add teacher
    public function getAddTeacher(){
        $dep = Department::all();
        return view('admin.page.addteacher', compact('dep'));
    }

    public function postAddTeacher(Request $req){

        $this->validate($req,
            [
                'username'=>'required|min:4|unique:users,username',
                'email'=>'required|unique:users,email',
                'password'=>'required|min:6',
                
            ],
            [
                'username.required'=>'Vui lòng nhập Tài Khoản',
                'username.min'=>'Tài Khoản phải có ít nhất 4 ký tự',
                'username.unique'=>'Tài Khoản đã tồn tại',
                'email.required'=>'Vui lòng nhập email!',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
            ]
        );

        $user1 = User::where('email', $req->email)->count('id');
        $user2 = User::where('username', $req->username)->count('id');
        if($user1 != 0 || $user1 != 0){
            return redirect()->route('addteacher')->with('message', 'Người này đã tồn tại');
        }
        $user = New User;
        $user->username = $req->username;
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->password = \Hash::make($req->pass);
        $user->hocvi = $req->hocvi;
        $user->avatar = 'avatar.png';
        $user->role = 0;
        $user->id_department = $req->id_department;
        $user->save();
        return redirect()->route('listteacher')->with('message', 'Thêm Thành Công');
    }   

    //edit teacher
    public function getEditTeacher($id){
        $user = User::where('id', $id)->first();
        $dep = Department::all();
        return view('admin.page.editteacher', compact('dep', 'user'));
    }

    public function postEditTeacher($id, Request $req ){
        
        $user = User::where('id', $id)->first();
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->hocvi = $req->hocvi;
        $user->maCB = $req->maCB;
        $user->id_department = $req->id_department;
        $user->save();
        return redirect()->route('listteacher')->with('message', 'Sửa Thành Công');
    }   

    //delete teacher
    public function getDeleteTeacher($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('listteacher')->with('message', 'Xóa Thành Công');
    }

    //add department
    public function getAddDep(){
        return view('admin.page.adddep');
    }

    public function postAddDep(Request $req){

        $dep = New Department;
        $dep->department_name = $req->department_name;
        $dep->address = $req->address;
        $dep->phone = $req->phone;
        $dep->typedepartment = $req->typedepartment;
        $dep->website = $req->website;
        
        $dep->save();
        return redirect()->route('listdep')->with('message', 'Thêm Thành Công');
    }   

    //edit teacher
    public function getEditDep($id){
        $dep = Department::where('id', $id)->first();
        return view('admin.page.editdep', compact('dep'));
    }

    public function postEditDep($id, Request $req ){
        
        $dep = Department::where('id', $id)->first();
        $dep->department_name = $req->department_name;
        $dep->address = $req->address;
        $dep->phone = $req->phone;
        $dep->typedepartment = $req->typedepartment;
        $dep->website = $req->website;
        $dep->save();
        return redirect()->route('listdep')->with('message', 'Sửa Thành Công');
    }   

    //delete teacher
    public function getDeleteDep($id){
        $dep = Department::where('id', $id)->first();
        $dep->delete();
        return redirect()->route('listdep')->with('message', 'Xóa Thành Công');
    }

    //list res
    public function getListRes(){
        $res_f = Reseach_Field::all();
        return view('admin.page.listresearch', compact('res_f'));
    }

    public function getAddRes(){
        return view('admin.page.addres');
    }

    public function postAddRes(Request $req){
        $res = new Reseach_Field;
        $res->research_field = $req->research_field;
        $res->save();
        return redirect()->route('listres')->with('message', 'Thêm Thành Công');
    }

     public function getAddLectRes(){
        $res = Reseach_Field::all();
        return view('admin.page.addlectres', compact('res'));
    }

    public function postAddLectRes(Request $req){
        $lectres = new Lecture_Research;
        $lectres->name = $req->name;
        $lectres->id_research_field = $req->id_research_field;
        $lectres->save();

        $lectqt = new Lecture_qt;
        $lectqt->name = $req->name;
        $lectqt->id_research_field = $req->id_research_field;
        $lectqt->save();
        return redirect()->route('listres')->with('message', 'Thêm Thành Công');
    }

    public function deleteLectRes($id){
        $lect = Lecture_Research::where('id', $id)->first();
        $lect->delete();
        return redirect()->route('listres')->with('message', 'Xóa Thành Công');
    }
}
