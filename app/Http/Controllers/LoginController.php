<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        //dd($request->all());
         $request->validate([
            'email' => 'required|unique:users|email',
            'name' => 'required|unique:users'|'max:10',
            'password'=>'required|min:8'
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




