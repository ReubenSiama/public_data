<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\BusinessType;
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
        $bType = new BusinessType;
        $bType->business_type = $request->business_type;
        $bType->description = $request->description;
        $bType->save();
        return back();
    }

    public function getRoles()
    {
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
}
