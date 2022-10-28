<?php

namespace App\Http\Controllers;

use App\Models\Changelog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return Auth::check() ? $this->viewDashboard() : view("login");
    }

    public function viewRegister()
    {
        return Auth::check() ? $this->viewDashboard() : view("register");
    }

    public function viewDashboard()
    {
        if (!Auth::check())
            return redirect()->intended("login");

        $changelogs = Changelog::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view("dashboard", [
            'changelogs' => $changelogs,
        ]);
    }

    public function viewProfile()
    {
        return Auth::check() ? view('profile') : view("login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
            return redirect()->intended('dashboard');

        return redirect('login')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password))
                    $fail('The current password is incorrect.');
            }],
            'new_password' => ['required'],
        ]);

        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request['new_password'])
        ]);

        Changelog::create([
            'activity' => 'Password changed',
            'user_id' => Auth::user()->id
        ]);

        Session::flush();
        Auth::logout();

        return redirect("login")->with('success', 'Password changed successfully');
    }
}
