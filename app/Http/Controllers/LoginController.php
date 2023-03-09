<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
        public function login(){
            return view('login.login');
        }

    public function loginproses(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        
        return redirect('login');
    }
    public function register()
    {
        return view ('login.register', [
            'tittle' => 'register'
        ]);
    }

    public function registeruser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $request->foto,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
    
        ]);
        return redirect()->route('login');
        }


        public function logout(){
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/');
    
        }
    
}




