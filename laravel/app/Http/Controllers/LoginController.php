<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function authenticate(Request $request) {

        $credentials = $request->only('login', 'password');
        //print_r($credentials);

        $user = User::where('login', $credentials['login'])->first();

        if (Hash::check($credentials['password'], $user['password_hash'])) {
            Auth::login($user);
            $request->session()->regenerate();
            Log::debug(Auth::user());
            echo "nice";
            return view('home');//redirect()->intended('home');
        }

        return view('login', ['status' => 'Incorrect credentials']);
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
