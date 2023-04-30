<?php

namespace App\Http\Controllers\Admin\Employe;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::all();
        return view('Admin/Employe/index' , compact('employes'));
    }

    public function create()
    {
        return view('Admin/Employe/create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'age'=> 'required|min:2|max:2',
            'phone'=> 'required|max:10',
            'address'=> 'required',
        ]);
    
       
        $password = $request->input('password');
        $email = $request->input('email');
    
       
        $existingEmploye = Employe::where('email', $email)->first();
    
        if ($existingEmploye) {
            return redirect()->back()->with('store_error_message','Employe already exists.');
        }
    
        if(Employe::create([
            'name' => $request->input('name'),
            'email'=> $email,
            'password' => Hash::make($password),
            'age'=> $request->input('age'),
            'phone'=> $request->input('phone'),
            'address'=> $request->input('address'),
        ]))
        {
            return redirect()->route('admin.employe.index')->with('store_success_message','Employe Added Successfully');
        } else
        {
            return redirect()->back()->with('store_error_message','Employe failed add check data ');
        } 
    }
}
