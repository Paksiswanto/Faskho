<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view ('login.index1', [
            'tittle' => 'Login'
        ]);
    }
    public function register()
    {
        return view ('login.register1', [
            'tittle' => 'register'
        ]);
    }

    
}
