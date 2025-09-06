<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Creator\AuthLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('creator.auth.login');
    }

    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->guard('creator')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('creator.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->guard('creator')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('creator.login');
    }
}
