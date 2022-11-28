<?php

namespace App\Http\Controllers\employee;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EmployeeWebController extends Controller
{
    public function signUp()
    {
        return view('employee.signUp');
    }
    public function saveEmp(Request $request)
    {
        $val = Validator::make($request->all(),[
            'employeeName' => 'required|string',
            'employeeEmail' => 'required|email',
            'employeePassword' => 'required|min:4|max:20',
            'employeePhone' => 'required|min:10|max:15',
            'employeeAddress' => 'required',

        ],[
            'employeeName.required' => 'Enter The Name',
            'employeeEmail.required' => 'Enter The Email',
            'employeePassword.required' => 'Enter The Password',
            'employeePhone.required' => 'Enter The Phone',
            'employeeAddress.required' => 'Enter The Address',
            'employeeName.string' => 'Error Enter String',
            'employeeEmail.email' => 'Error Enter Email',
            'employeePassword.min' => 'Error Min 4 Chars',
            'employeePassword.max' => 'Error Max 20 Chars',
            'employeePhone.min' => 'Error Min 10 Chars',
            'employeePhone.max' => 'Error Max 15 Chars',
        ]);
        if($val->fails())
        {
            return $val->errors();
        }
        else
        {
        $create = Employee::create([
            'employeeName'=>$request->employeeName,
            'employeeEmail'=>$request->employeeEmail,
            'employeePassword'=>sha1($request->employeePassword),
            'employeePhone'=>$request->employeePhone,
            'employeeAddress'=>$request->employeeAddress,
            'employeeStats' => 1
        ]);
        if($create) {
            return view('employee.login');
        }
    }
}
    public function login()
    {
        return view('employee.login');
    }
    public function loginEmployee(Request $req)
    {
        $valLogin = Validator::make($req->all(),[
            'employeeEmail' => 'required',
            'employeePassword' => 'required',
        ],[
            'employeeEmail.required' => 'Enter The Email',
            'employeePassword.required' => 'Enter The Password',
        ]);
        if($valLogin->fails())
        {
            return $valLogin->errors();
        }
        else
        {
        $login = Employee::where([
            'employeeEmail' => $req->employeeEmail,
            'employeePassword' =>sha1($req->employeePassword),
        ])->get();
        if(count($login) > 0) {
                session(['employeeID' => $login[0]->employeeID]);
                session(['employeeName' => $login[0]->employeeName]);
                session(['employeeEmail' => $login[0]->employeeEmail]);
                session(['employeePassword' => $login[0]->employeePassword]);
                session(['employeeStats' => $login[0]->employeeStats]);
                session(['sectionID' => $login[0]->sectionID]);
                return redirect()->intended(default:'dashEmp');
            }
        }
    }
        public function dashEmp()
        {
            $ID = Session::get('employeeID');
            $query = Experience::where('employeeID',$ID)->get();
            return view('employee.dashEmp',compact('query'));
        }
        public function empProfile()
        {
            $empProfile = Employee::where([
                'employeeID' => Session::get('employeeID'),
                'employeeName' => Session::get('employeeName'),
                'employeeEmail' => Session::get('employeeEmail'),
                'employeePassword' => Session::get('employeePassword'),
            ])->get();
            return view('employee.profile',compact('empProfile'));
        }
        public function editEmp($ID)
        {
            $editEmp = Employee::where('employeeID',$ID)->get();
            return view('employee.edit',compact('editEmp'));
        }
        public function updateEmp(Request $requ,$ID)
        {
            $ID = Session::get('employeeID');
            $update = Employee::where('employeeID',$ID)->update([
                'employeeName' => $requ->employeeName,
                'employeeEmail' => $requ->employeeEmail,
                'employeePhone' => $requ->employeePhone,
                'employeeAddress' => $requ->employeeAddress,

            ]);
            if($update) {
                session::flush();
                Auth::logout();
                return redirect()->route('login');
            }
        }

        public function experience()
        {

            return view('employee.experience');
        }
        public function saveExperience(Request $request)
        {

            $saveExperience = Experience::create([
                'experience' => $request->experience,
                'experienceDate' => $request->experienceDate,
                'employeeID' => $request->employeeID
            ]);
            if($saveExperience) {
                return redirect()->route('login');
            }
        }
        public function logout()
        {
            session::flush();
            Auth::logout();
            return redirect()->route('login');
        }
    }
