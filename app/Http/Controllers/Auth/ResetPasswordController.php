<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function guard()
    {
        return Auth::guard('web');
    }

    public function broker()
    {
        return Password::broker('users');
    }

    public function showResetForm(Request $request, $token  = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function reset(Request $request)
    {
        $kasir = User::where('email', $request->email)->first();
        $kasir->password = Hash::make($request->password);
        $kasir->setRememberToken(Str::random(60));
        $kasir->update();

        return redirect()->route('login')->with('success', 'berhasil reset password, silahkan login kembali');
    }

}
