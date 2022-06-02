<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OtentikasiController extends Controller
{
    //
    public function loginIndex()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function registerIndex()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ]);

        $username = $validated['username'];
        $email = $validated['email'];
        $password = bcrypt($validated['password']);

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->role = 3;
        $user->poin = 0;
        $user->status_user = true;
        $user->save();

        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($inputan)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
    }

    public function login(Request $request)
    {
        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $role = DB::table('users')->where('email', $inputan['email'])->value('role');

        if ($role == 1) {
            if (Auth::attempt($inputan)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }

            return back()->with('errorLogin', 'Login Gagal !');
        } else if ($role == 2) {
            if (Auth::attempt($inputan)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard-perpustakaan');
            }

            return back()->with('errorLogin', 'Login Gagal !');
        } else {
            if (Auth::attempt($inputan)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return back()->with('errorLogin', 'Login Gagal !');
        }

        return back()->with('errorLogin', 'Login Gagal !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
