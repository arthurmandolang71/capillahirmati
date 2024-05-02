<?php

namespace App\Http\Controllers;

use App\Models\Pekara;
use Illuminate\Http\Request;

class PerkaraControoller extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $perkara = Pekara::orderBy('created_at')->get();

        return view('pn.index', [
            'title' => 'Data Konfirmasi Keputusan PN Manado',
            'perkara' => $perkara,
        ]);
    }

    public function dash()
    {

        $perkara = Pekara::get();

        $total_perkara = $perkara->count();
        $total_perkara_konfirmasi = $perkara->where('status', '!=', 'Perlu Konfirmasi')->count();

        // dd($total_perkara_konfirmasi);

        return view('pn.dash', [
            'title' => 'Dashboard',
            'total_perkara' => $total_perkara,
            'total_perkara_konfirmasi' => $total_perkara_konfirmasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $katagori = Stakeholder::all();

        return view('pn.create', [
            'title' => 'Tambah Keputusan PN',
            'katagori' => ['Perceraian', 'Perubahan Biodata,', 'Pengakatan Anak', 'Pengakatan Ana', 'Pengakuan Anak'],
            'status' => ['Perlu Konfirmasi', 'Tidak Valid', 'Valid'],
            // 'katagori' => $katagori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = [
            'nama' => ['required'], // penggugat
            'tergugat' => ['required'],
            'nomor_hp' => ['required'],
            'nomor_perkara' => ['required'],
            'tanggal' => ['required'],
            'katagori' => ['required'],
            'file_cover' => ['required'],
        ];

        $validateData = $request->validate($validasi);

        if ($request->file('file_cover')) {
            $validasi['file_cover'] = ['file', 'mimes:pdf', 'max:5024'];
        }

        $validateData['file_cover'] =  $request->file('file_cover')->store('file_cover');
        $validateData['status'] =  'Perlu Konfirmasi';
        // dd($validateData);

        Pekara::create($validateData);

        return redirect('/perkara')->with('pesan', 'data barhasil di tambah');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekara $Pekara, $id)
    {
        $perkara = Pekara::where('id', $id)->first();
        // dd($perkara);
        return view('pn.edit', [
            'title' => 'Edit Data',
            'perkara' =>  $perkara,
            'katagori' => ['Perceraian', 'Perubahan Biodata,', 'Pengakatan Anak', 'Pengakatan Ana', 'Pengakuan Anak'],
            'status' => ['Perlu Konfirmasi', 'Tidak Valid', 'Valid'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $validasi = [
            'nama' => [],
            'nomor_hp' => [],
            'nomor_perkara' => [],
            'tanggal' => [],
            'katagori' => [],
            'file_cover' => [],
            'status' => [],
            'penejelasan' => [],
        ];

        $validateData = $request->validate($validasi);

        // dd($validateData);

        Pekara::where('id', $id)->update($validateData);

        return redirect("/perkara")->with('pesan', 'data barhasil di update! silakan cek kembali');
    }
}
