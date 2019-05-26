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


class TeacherController extends Controller
{
    public function getUpdateInfo(){
        $id = Auth::User()->id;
        $user = User::where('id', $id)->first();

        //get reseach by user
        $research = User_Research::where('id_user', $id)->get(); 

        //get reseach 
        //get lecture_qt by user
        $lecture = User_Lecture::where('id_user', $id)->get();

        //get lecture 
        $lectureadd = DB::table('lecture_qt')
            ->join('research_field','research_field.id','=','lecture_qt.id_research_field')
            ->select('research_field.*')
            ->get();

        //get all research
        $research_field = Reseach_Field::all();
    	return view('teacher.updateinfo', compact('user', 'research', 'lecture', 'research_field', 'lectureadd'));
    }

    // login
    public function getLoginTeacher(){
    	return view('teacher.login');
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
            return redirect('/search-teacher');
        }

        else{
            return redirect('/teacher/login')->with('message','Đăng Nhập thất bại');
        }
        
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/teacher/login');
    }

    //ajax add lecture_qt
    public function addLecture_qt(Request $req) {
        $result = false;
        $id = Auth::User()->id;
        foreach($req->allVals as $allVals){
            $lecture = User_Lecture::where('id_lecture_qt', $allVals)
                                    ->where('id_user', $id)->first();
            if($lecture != null){
                $result = true;
            }

            else
            {
            $lecture_qt = new User_Lecture;
            $lecture_qt->id_user = $id;
            $lecture_qt->id_lecture_qt = $allVals;
            $lecture_qt->save();
            }
        }
        return response()->json($result);
    }

    //delete lecture_qt
    public function deleteLecture_qt($id){
        $lecture = User_Lecture::where('id_lecture_qt', $id)->first();
        $lecture->delete();
        return redirect()->back()->with('message', 'Đã Xóa');
    }

    //updateinfo
    public function getUpdate($id){
        $user = User::where('id', $id)->first();
        return view('teacher.update', compact('user'));
    }

    public function postUpdateInfo($id , Request $req){
        $user = User::where('id', $id)->first();
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->hocvi = $req->hocvi;
        if($req->hasFile('avatar')){
            $file = $req->File('avatar');
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi == 'jpg' || $duoi == 'png'){
                $savefile = str_random(4)."_".$name;
            while(file_exists("source/img/".$savefile))
            {
                $savefile = str_random(4)."_".$name;
            }
            $file->move("source/img/", $savefile);
            $user->avatar = $savefile;  
            }

            else{

                return redirect()->back()->with('loi', 'file không đúng định dạng');
            }
    
        }
        else{
            $user->avatar = $user->avatar;
        }  
        $user->save();
        return redirect()->back()->with('message', 'Cập nhật Thành Công');
    }

    
}
