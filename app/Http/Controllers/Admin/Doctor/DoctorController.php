<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();

        return view('Admin/Doctor/index' , compact('doctors'));
    }

    public function create()
    {
        return view('Admin/Doctor/create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $password = $request->input('password');
        $email = $request->input('email');
    
       
        $existingDoctor = Doctor::where('email', $email)->first();
    
        if ($existingDoctor) {
            return redirect()->back()->with('store_error_message','Doctor already exists.');
        }
    
        if(Doctor::create([
            'name' => $request->input('name'),
            'email'=> $email,
            'password' => Hash::make($password),
            'college'=> $request->input('college'),
            'specialization'=> $request->input('specialization'),
        ]))
        {
            return redirect()->route('admin.doctor.index')->with('store_success_message','Doctor Added Successfully');
        } else
        {
            return redirect()->back()->with('store_error_message','Doctor failed add check data ');
        } 
    }
    
}
