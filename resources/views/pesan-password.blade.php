<p>Hello,</p>
<p>Click the following link to reset your password:</p>
<p><a href="{{ route('reset.password.form', ['token' => $token]) }}">{{ route('reset.password.form', ['token' => $token]) }}</a></p>
<p>If you did not request a password reset, please ignore this email.</p>
