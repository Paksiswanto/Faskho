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
            'name' => 'required|unique:users',
            'password'=>'required|min:8'
        ]);
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $request->foto,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
    
        ]);
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
=======
>>>>>>> f88e9ef42a0ec8cb3b275acf69b19ea6b770a792
>>>>>>> Stashed changes
        return redirect()->route('login');
        }


        public function logout(){
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/');
    
        }
    
}




