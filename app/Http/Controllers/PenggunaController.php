<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::with('level_ref')->where('level', '!=', 10)->get();

        return view('pengguna.index', [
            'title' => 'Pengguna Stakeholder',
            'pengguna' => $pengguna,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $level = UserLevel::where('id', '<', 10);

        return view('pengguna.create', [
            'title' => 'Tambah Stakoholder',
            'kategori' => ['Rumah Sakit', 'Puskesmas', 'Klinik', 'Kelurahan'],
            'level' => $level,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasi = [
            'name' => ['required'],
            'username' => ['required', 'unique:users', 'min:6'],
            'password' => ['required', 'min:6'],
            'no_wa' => ['required'],
        ];

        $validateData = $request->validate($validasi);

        $validateData['active'] = 1;
        $validateData['level'] = 1;
        $validateData['foto_profil'] = 'defaul_user.jpg';
        $validateData['foto_banner'] = 'foto_banner.jpg';
        $validateData['password'] = Hash::make($validateData['password']);

        // dd($validateData);

        User::create($validateData);

        return redirect('/pengguna')->with('pesan', 'data barhasil di tambah');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $level = UserLevel::where('id', '<', 10);
        $pengguna = user::where('id', $id)->first();
        // dd($pengguna);
        return view('pengguna.edit', [
            'title' => 'Edit Pengguna',
            'pengguna' =>  $pengguna,
            'kategori' => ['Rumah Sakit', 'Puskesmas', 'Klinik', 'Kelurahan'],
            'level' => $level
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $validasi = [
            'name' => ['required'],
            'no_wa' => ['required'],
            'katagori' => ['required'],
            'active' => [],
        ];

        if ($request->password) {
            $validasi['password'] = ['required', 'min:6'];
        }

        // dd(User::where('id', $id)->first()->username);

        if ($request->username != User::where('id', $id)->first()->username) {
            $validasi['username'] = ['required', 'unique:users', 'min:6'];
        }

        $validateData = $request->validate($validasi);

        if ($request->password) {
            $validateData['password'] = Hash::make($validateData['password']);
        }

        if (!$request->active) {
            $validateData['active'] = false;
        }

        // dd($validateData);

        User::where('id', $id)->update($validateData);

        return redirect("/pengguna")->with('pesan', 'data barhasil di update! silakan cek kembali');
    }

    // public function destroy(User $user)
    // {
    //     User::where('id', $user->id)->delete();
    //     return redirect("/pengguna")->with('pesan', 'data barhasil di dihapus');
    // }
}
