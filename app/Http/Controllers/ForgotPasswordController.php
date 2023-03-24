<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::send('pesan-password', ['token' => $token], function ($message) use ($email) {
            $message->to($email)->subject('Reset Password');
        });

        return redirect()->back()->with('success', 'Reset link has been sent to your email address');
    }
}
