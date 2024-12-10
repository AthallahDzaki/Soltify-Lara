<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::attempt($creds)) {
            return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withErrors(['You have entered invalid credentials']);
    }

    public function postRegister(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'confirm-password' => 'required|same:password',
            'password' => 'required'
        ]);

        $data = $request->all();
        $this->create($data);
        return redirect("dashboard")->withSuccess('You have Successfully created account');
    }

    public function dashboard(): View|RedirectResponse
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withErrors(['You are not allowed to access']);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        session()->flush();
        session()->regenerate();

        return redirect('/');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'], [
                'algo' => PASSWORD_ARGON2ID,
            ]),
            'role' => 0,
            'remember_token' => null,
        ]);
    }
}
