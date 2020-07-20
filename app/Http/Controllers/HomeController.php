<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\BusinessType;
use App\DailyReport;
use App\PublicData;
use App\Role;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function login()
    {
        return view('login');
    }

    public function getBusinessTypes()
    {
        $bTypes = BusinessType::get();

        return view('business-types', compact('bTypes'));
    }

    public function addBusinessType(Request $request)
    {
        $request->validate([
            'business_type' => 'required',
            'description' => 'required',
        ]);
        $bType = new BusinessType;
        $bType->business_type = $request->business_type;
        $bType->description = $request->description;
        if(Auth::user()->role->role_name == 'Admin'){
            $bType->status = 'Approved';
        }
        $bType->save();
        return back();
    }

    public function getRoles()
    {
        if(Auth::user()->role->role_name != 'Admin'){
            return back()->withError('You do not have permossio to enter this page');
        }
        $roles = Role::get();
        return view('roles', compact('roles'));
    }

    public function getUsers()
    {
        $users = User::get();
        $roles = Role::get();
        return view('users', compact('users', 'roles'));
    }

    public function addUser(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;
        $user->save();
        return back()->withSuccess('User Added Successfully');
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        if($request->email != $user->email){
            $request->validate([
                'email' => 'required|unique:users'
            ]);
        }
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return back()->withSuccess('User Updated Successfully');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('home');
        }else{
            return back()->withError('Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function approveBusinessType($id)
    {
        $bType = BusinessType::findOrFail($id);
        $bType->status = 'Approved';
        $bType->save();
        return back();
    }

    public function addRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);
        $role = new Role;
        $role->role_name = $request->role_name;
        $role->save();
        return back();
    }

    public function updateRole(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->role_name = $request->role_name;
        $role->save();
        return back();
    }

    public function deleteRole(Request $request)
    {
        Role::findOrFail($request->id)->delete();
        return back();
    }

    public function getReports(Request $request)
    {
        $users = User::get();
        $select_date = $request->date;

        $reports = DailyReport::when($select_date, function ($query, $select_date) {
            return $query->where('report_date',$select_date);
        }, function ($query) {
            return $query->where('report_date', Date('Y-m-d'));
        })
        ->get();
        $dates = DailyReport::groupBy('report_date')->pluck('report_date');
        return view('reports', compact('reports', 'dates'));
        
    }
}
