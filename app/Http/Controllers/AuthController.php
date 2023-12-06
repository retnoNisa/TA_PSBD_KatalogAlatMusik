<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerSimpan(Request $request) 
    {
        Validator::make($request->all(),[
            'nama_user' => 'required',
            'email' => 'required|email',
            'tgl_lahir' => 'required|date',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }
    public function login(){
        //harus logout untuk bisa keluar halaman
        if (session('isLogin')) {
            return redirect()->route('dashboard');
        }
        return view ('auth/login');
    }
    
    public function loginAksi(Request $request){
        Validator::make($request->all(),[
            'email' => 'required|email', 
            'password' => 'required'  
        ])->validate();
    
        if(!Auth::attempt($request->only('email','password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email'=>trans('auth.failed')
            ]);
        }
    
        // Set session 'isLogin' ke true
        session(['isLogin' => true]);
    
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }
    

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
    
}
