<?php

namespace App\Http\Controllers;

use App\Models\Changelog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'username' => ['required', 'regex:/^(?!.*_{2,})[a-zA-Z0-9]\w*[a-zA-Z0-9]$/', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
            'is_adult' => ['accepted'],
        ], [
            'is_adult.accepted' => 'You must be 18 years or older to register.',
        ]);

        $data = $request->only(['username', 'email', 'password']);

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        Auth::login($user);

        return redirect("dashboard");
    }

    public function update(Request $request)
    {
        if (!Auth::check())
            return redirect()->intended("login");

        $request->validate([
            'phone' => ['nullable', 'regex:/[0-9]{8,10}/'],
            'country' => ['nullable', Rule::in(['United States', 'Canada', 'Mexico'])],
            'address_1' => ['nullable', 'max:140'],
            'address_2' => ['nullable', 'max:140'],
        ]);

        $data = $request->only(['first_name', 'last_name', 'phone', 'address_1', 'address_2', 'city', 'state', 'zip', 'country']);

        User::where('id', Auth::user()->id)->update($data);

        Changelog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Updated profile',
        ]);

        return redirect("profile");
    }
}
