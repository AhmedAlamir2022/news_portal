<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HandleLoginRequest;
use App\Mail\AdminSendResetLinkMail;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminAuthenticationController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function handleLogin(HandleLoginRequest $request)
    {
        $request->authenticate();
        return redirect()->route('admin.dashboard')->with('success','Login Successfull');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.login')->with('error','Admin Logout Successfull');
    }

    public function forgotPassword()
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:admins,email']
        ]);
        $token = \Str::random(64);
        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();
        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email));
        return redirect()->back()->with('success', 'A mail has been sent to your email address please check!');
    }

    public function resetPassword($token)
    {
        return view('admin.auth.reset-password', compact('token'));
    }

    public function handleResetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required']
        ]);
        $admin = Admin::where(['email' => $request->email, 'remember_token' => $request->token])->first();
        if(!$admin){
            return back()->with('error', 'token is invalid');
        }
        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login')->with('success','Password reset successfull');

    }
}
