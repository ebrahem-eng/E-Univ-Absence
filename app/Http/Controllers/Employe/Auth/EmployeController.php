<?php

namespace App\Http\Controllers\Employe\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function Login_page()
    {
        return view('Employe/Auth/login');
    }

    public function Login_check(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $check = $request->all();

        if (Auth::guard('employe')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('employe.dashboard');
        } else {
            return redirect()->back()->with('error_login_message', 'Check Email Or Password');
        }
    }


    public function dashboard()
    {
        return view('Employe/index');
    }

    public function logout()
    {
        Auth::guard('employe')->logout();

        return redirect()->route('employe.login.page');
    }
}
