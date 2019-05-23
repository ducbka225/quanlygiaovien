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

        //get department
        $department_user = Department_User::where('id_user', $id)->first();

        //get all research
        $research_field = Reseach_Field::all();
    	return view('teacher.updateinfo', compact('user', 'research', 'lecture', 'department_user', 'research_field', 'lectureadd'));
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
}
