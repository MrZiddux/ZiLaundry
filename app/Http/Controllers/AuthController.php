<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getDataOutlet()
    {
        $outlets = Outlet::get();
        return response()->json($outlets);
    }

    public function store(Request $r)
    {

        // make validation for all fields in request
        $r->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|unique:tb_user|min:6',
            'password' => 'required|min:6',
            'id_outlet' => 'required',
            'rules_check' => 'accepted',
        ]);

        User::create([
            'nama' => $r->nama,
            'username' => strtolower($r->username),
            'password' => bcrypt($r->password),
            'id_outlet' => $r->id_outlet,
            'rules_check' => $r->rules_check,
            'role' => 'admin',
        ]);

        return redirect('/login')->with('success', 'Successfully registered');
    }

    public function checkUsername(Request $r)
    {
        $user = User::where('username', $r->username)->first();
        if ($user) {
            return response()->json(array('success' => true));
        } else {
            return response()->json(array('success' => false));
        }
    }

    // make function middleware for multi user 


    public function check(Request $r)
    {
        $r->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $r->username)->first();
        if (!$user) {
            return back()->with('username', 'Username not found');
        }

        if (!Hash::check($r->password, $user->password)) {
            return back()->with('password', 'Password not match');
        }
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}
