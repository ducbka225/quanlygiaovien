<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Department;
use App\Reseach_Field;
use App\Department_User;
use App\Lecture_qt;
use App\Lecture_Research;
use App\User;
use DB;

class studentController extends Controller
{
    public function getSearchTeacher(){
    	//get all department
    	$department = Department::all();

    	//get all researchfiel
    	$research_field = Reseach_Field::all();
    	return view('student.searchTeacher', compact('department', 'research_field'));
    }

	//ajax get user by department
    public function searchByDep(Request $req) {
	    $result = DB::table('users')
            ->join('department_user','department_user.id_user','=','users.id')
            ->join('department', 'department_user.id_department','=','department.id')
            ->where(['department_user.id_department' => $req->id])
            ->select('users.*', 'department.department_name')
            ->get();    
	    return response()->json($result);
	}

  	//ajax get user by lecture
    public function searchByLec(Request $req) {
	    $result = DB::table('users')
            ->join('department_user','department_user.id_user','=','users.id')
            ->join('department', 'department_user.id_department','=','department.id')
            ->join('lecture_qt', 'lecture_qt.id_user', '=', 'users.id')
            ->where(['lecture_qt.id' => $req->idlec])
            ->select('users.*', 'department.department_name')
            ->get();    
	    return response()->json($result);
	}


	// get infoteacher
	public function getInfoTeacher($id){
		//get user by id
		$user = User::where('id', $id)->first();

		//get reseach by user
		$research = Lecture_Research::where('id_user', $id)->get();  
        //get lecture_qt by user
        $lecture = Lecture_qt::where('id_user', $id)->get();

        //get department
        $department_user = Department_User::where('id_user', $id)->first();
		return view('student.infoteacher', compact('user', 'research', 'lecture', 'department_user'));
	}	
}
