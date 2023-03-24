<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showForm(Request $request, $token)
    {
        $reset = DB::table('password_resets')->where('token', $token)->first();
        $email = $request->query('email');

        if (!$reset) {
            return redirect()->route('forgot.password')->with('error', 'Invalid reset link');
        }

        return view('reset-password', ['token' => $token, 'email' => $email]);
    }

   public function updatePassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'password' => 'required|confirmed|min:8'
    ]);

    $reset = DB::table('password_resets')
        ->where('token', $request->input('token'))
        ->first();

    if (!$reset) {
        return redirect()->route('forgot.password.form')->with('error', 'Invalid reset link');
    }

    DB::table('users')
        ->where('email', $reset->email)
        ->update(['password' => Hash::make($request->input('password'))]);

    DB::table('password_resets')->where('email', $reset->email)->delete();

    return redirect()->route('login')->with('success', 'Password reset successfully');
}

}
