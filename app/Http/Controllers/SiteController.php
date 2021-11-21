<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function login()
    {
        $user = DB::table('user')->get();
        // dd($user);
        return view('login', compact('user'));
    }

    public function prosesLogin(Request $request)
    {
        $credential = [
            "username" => $request->username,
            "password" => $request->password
        ];

        try {
            Auth::attempt($credential);
            if(Auth::user()){
                return redirect("dashboard");
            }else{
                return redirect('/')->with('danger', 'Username / Password Salah');
            }
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/')->with('danger', 'system error');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
