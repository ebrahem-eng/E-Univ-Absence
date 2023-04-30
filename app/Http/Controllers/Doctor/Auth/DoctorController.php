<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function Login_page()
    {
        return view('Doctor/Auth/login');
    }

    public function Login_check(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $check = $request->all();

        if (Auth::guard('doctor')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('doctor.dashboard');
        } else {
            return redirect()->back()->with('error_login_message', 'Check Email Or Password');
        }
    }


    public function dashboard()
    {
        return view('Doctor/index');
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();

        return redirect()->route('doctor.login.page');
    }

}
