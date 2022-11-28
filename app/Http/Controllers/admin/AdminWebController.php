<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Message;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminWebController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function loginAdmin(Request $request)
    {
        $val = Validator::make($request->all(),[
            'adminEmail' => 'required|email',
            'adminPassword' => 'required'
        ],[
            'adminEmail.required' => 'Enter Email',
            'adminPassword.required' => 'Enter Password',

        ]);
        if($val->fails())
        {
            return $val->errors();
        } else
        {
        $login = Admin::where([
            'adminEmail' => $request->adminEmail,
            'adminPassword' =>sha1($request->adminPassword),
        ])->get();
        if(count($login) > 0) {
            session(['ID' => $login[0]->adminID]);
            session(['Name' => $login[0]->adminName]);
            session(['Email' => $login[0]->adminEmail]);
            session(['Fullname' => $login[0]->adminFullname]);
            return redirect()->intended(default:'dashboard');
        }
    }
}
    public function dashboard()
    {
        $adminID = session::get('adminID');
        return view('admin.dashboard',compact('adminID'));
    }
    public function myProfile()
    {
        $information = Admin::where([
            'adminID' => session::get('adminID'),
            'adminName' => session::get('adminName'),
            'adminEmail' => session::get('adminEmail'),
            'adminFullname' => session::get('adminFullname'),
        ])->get();
        return view('admin.profile',compact('information'));
    }
    public function employees()
    {
        $employees = DB::table('section')
                    ->join('employee','section.sectionID','=','employee.sectionID')
                    ->get();

        return view('admin.employees',compact('employees'));
    }
    public function edit($ID)
    {
        $edit = Admin::where('adminID',$ID)->get();
        return view('admin.edit',compact('edit'));
    }
    public function update(Request $req ,$ID)
    {
        $update = Admin::where('adminID',$ID)->update([
            'adminName' => $req->adminName,
            'adminEmail' => $req->adminEmail,
            'adminPassword' => $req->adminPassword,
            'adminFullname' => $req->adminFullname,
        ]);
        if($update) {
        session::flush();
        Auth::logout();
        return redirect()->route('index');
        }
    }
    public function sections()
    {
        $ID = Session::get('ID');
        $sections = DB::table('admin')
                    ->join('section','admin.adminID','=','section.adminID')
                    ->where('admin.adminID',$ID)
                    ->select()
                    ->get();
        return view('admin.mySection',compact('sections'));
    }
    public function view($sectionID)
    {
        $section = Section::where('sectionID',$sectionID)->get();
        $allEmployees = DB::table('section')
                        ->join('employee','section.sectionID','=','employee.sectionID')
                        ->where('section.sectionID',$sectionID)
                        ->get();
        return view('admin.viewSection',compact('section'),compact('allEmployees'));
    }
    public function deleteSections($ID)
    {
        $delete = Section::where('sectionID',$ID)->delete();
        return redirect()->route('sections');
    }
    public function acvtive($ID)
    {
        $Up = Employee::where('employeeID',$ID)->get();
        if($Up[0]->employeeID == 1) {
            $acvtive = Employee::where('employeeID',$ID)->update([
                'employeeStats' => 2
            ]);
            return redirect()->route('sections');
        }
    }
    public function unActive($ID)
    {
        $un = Employee::where('employeeID',$ID)->get();
        if($un[0]->employeeID == 1) {
            $unacvtive = Employee::where('employeeID',$ID)->update([
                'employeeStats' => 1
            ]);
            return redirect()->route('sections');
        }
    }
    public function deleteEmployee($ID)
    {
        $deleteEmployee = Employee::where('employeeID',$ID)->delete();
        return redirect()->route('sections');
    }
    public function viewExperience($ID)
    {
        $Experiences = DB::table('employee')
                    ->join('experience','employee.employeeID','=','experience.employeeID')
                    ->where('employee.employeeID',$ID)
                    ->get();
        return view('admin.viewExperience',compact('Experiences'));
    }
    public function viewEmployee($ID)
    {
        $view = Employee::where('employeeID',$ID)->get();
        return view('admin.viewEmployee',compact('view'));
    }
    public function DeleEmployee($ID)
    {
        $DeleEmployee = Employee::where('employeeID',$ID)->delete();
        return redirect()->route('employees');
    }
    public function message($ID)
    {
        $employeeID = Employee::where('employeeID',$ID)->get();
        return view('admin.message',compact('employeeID'));
    }
    public function saveMessage(Request $request)
    {
        $save = Message::create([
            'messageText' => $request->messageText,
            'employeeID' => $request->employeeID,
        ]);
        return redirect()->route('sections');
    }

    public function logout()
    {
        session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
