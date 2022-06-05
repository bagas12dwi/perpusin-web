<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function indexUser()
    {
        # code...
        $user = DB::table('users')
            ->select('*', DB::raw(
                "CASE
                    WHEN users.role = 1 THEN 'Admin'
                    WHEN users.role = 2 THEN 'Perpustakaan'
                    ELSE 'User'
                END AS role_string
            "
            ), DB::raw(
                "CASE
                    WHEN users.status_user = 1 THEN 'Aktif'
                    ELSE 'Tidak Aktif'
                END AS status
            "
            ))
            ->get();

        $userID = DB::table('users')
            ->value('id');
        return view('admin.user', [
            'title' => 'User'
        ], compact('user'))->with('userId', $userID);
    }

    public function indexAddAdmin()
    {
        return view('admin.add-admin-form', [
            'title' => 'Tambahkan Admin'
        ]);
    }

    public function addAdmin(Request $request)
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
        $user->role = 1;
        $user->poin = 0;
        $user->status_user = true;
        $user->save();

        return redirect()->intended('/admin');
    }


    public function aktif(Request $request)
    {
        $id = $request->input('id');

        DB::table('users')
            ->where('users.id', $id)
            ->update([
                'users.status_user' => 1
            ]);
        return redirect()->intended('/list-user');
    }

    public function suspend(Request $request)
    {
        $id = $request->input('id');

        DB::table('users')
            ->where('users.id', $id)
            ->update([
                'users.status_user' => 0
            ]);
        return redirect()->intended('/list-user');
    }

    public function indexPerpus()
    {
        # code...
        $user = DB::table('users')
            ->select('*', DB::raw(
                "CASE
                    WHEN users.role = 1 THEN 'Admin'
                    WHEN users.role = 2 THEN 'Perpustakaan'
                    ELSE 'User'
                END AS role_string
            "
            ), DB::raw(
                "CASE
                    WHEN users.status_user = 1 THEN 'Aktif'
                    ELSE 'Tidak Aktif'
                END AS status
            "
            ))
            ->where('users.role', 2)
            ->get();

        $userID = DB::table('users')
            ->value('id');
        return view('admin.admin', [
            'title' => 'Admin Perpustakaan'
        ], compact('user'))->with('userId', $userID);
    }

    public function indexAddPerpus()
    {
        return view('admin.add-perpus', [
            'title' => 'Tambahkan Perpustakaan'
        ]);
    }

    public function addPerpus(Request $request)
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
        $user->role = 2;
        $user->poin = 0;
        $user->status_user = true;
        $user->save();

        return redirect()->intended('/list-perpus');
    }
}
