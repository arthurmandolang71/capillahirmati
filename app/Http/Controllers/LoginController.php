<?php

namespace App\Http\Controllers;

use App\Models\CalegRi;
use App\Models\CalegProv;
use App\Models\CalegKabkota;
use Illuminate\Http\Request;
use App\Models\DapilProvWilayah;
use Illuminate\Routing\Controller;
use App\Models\DapilKabkotaWilayah;
use App\Models\Partai;
use App\Models\TimReferensi;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // dd('test');
        return view(
            'auth.login'
        );
    }

    public function auth(Request $request)
    {
        // dd($request->post());
        $cridentials = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ]
        );

        $cridentials['active'] = 1;

        if (Auth::attempt($cridentials)) {
            $request->session()->regenerate();

            $id = auth()->user()->id;
            $username = auth()->user()->username;
            $name = auth()->user()->name;
            $foto = auth()->user()->foto;

            $request->session()->put('user_id', $id);
            $request->session()->put('username', $username);
            $request->session()->put('name', $name);
            $request->session()->put('foto', $foto);

            // dd(Auth::user());

            return redirect()->intended('/welcome');
        }

        return back()->with('pesan', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/login')->with('pesan', 'anda berhasil logout');
    }
}
