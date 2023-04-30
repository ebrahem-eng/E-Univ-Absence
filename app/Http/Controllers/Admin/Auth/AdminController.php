<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Login_page()
    {
        return view('Admin/Auth/login');
    }

    public function Login_check(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $check = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error_login_message', 'Check Email Or Password');
        }
    }


    public function dashboard()
    {
        return view('Admin/index');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login.page');
    }
}
