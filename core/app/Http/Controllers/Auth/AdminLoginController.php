<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin',['except' => ['adminLogout']]);
    }
    public function showLoginForm()
    {
        return view('admin.account.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['name' => $request->name , 'password' => $request->password])){
           return redirect()->route('admin.dashboard')->with('success','Logged In Successfully');
        }
        return redirect()->back()->withinput($request->only('name'));
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('success','Logged Out Successfully');
    }
}
