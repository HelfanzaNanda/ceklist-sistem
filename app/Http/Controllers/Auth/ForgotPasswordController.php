<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    //use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function broker()
    {
        return Password::broker('users');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    public function messageSuccess()
    {
        return "Kami telah mengirimkan email untuk pengaturan ulang kata sandi Anda!";
    }

    public function messageFail()
    {
        return "masukkan email anda yang benar";
    }

    protected function credentials(Request $request)
    {
        return $request->only('email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse()
            : $this->sendResetLinkFailedResponse($request);
    }

    public function sendResetLinkResponse()
    {
        return back()->with('success', $this->messageSuccess());
    }

    public function sendResetLinkFailedResponse(Request $request)
    {
        return back()->withInput($request->only('email'))
                ->withErrors(['email' => trans($this->messageFail())]);
    }
}
