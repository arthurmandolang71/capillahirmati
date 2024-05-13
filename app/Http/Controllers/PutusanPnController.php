<?php

namespace App\Http\Controllers;

use App\Models\PutusanPn;
use Illuminate\Http\Request;

class PutusanPnController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $putusanpn = PutusanPn::orderBy('created_at')->get();

        return view('putusanpn.index', [
            'title' => 'Data Pengiriman Salinan Putusan',
            'putusanpn' => $putusanpn,
        ]);
    }

    public function dash()
    {

        $perkara = PutusanPn::get();

        $total_perkara = $perkara->count();
        $total_perkara_konfirmasi = $perkara->where('status', '!=', 'Perlu Konfirmasi')->count();

        // dd($total_perkara_konfirmasi);

        return view('pnputusan.dash', [
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
        return view('putusanpn.create', [
            'title' => 'Tambah Pengiriman Salinan Putusan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = [
            'nomor_perkara' => [],
            'tanggal' => [],
            'penggugat' => [],
            'tergugat' => [],
            'file' => [],
        ];

        $validateData = $request->validate($validasi);

        if ($request->file('file')) {
            $validasi['file'] = ['file', 'mimes:pdf', 'max:5024'];
        }

        $validateData['file'] =  $request->file('file')->store('file-pn');

        // dd($validateData);

        PutusanPn::create($validateData);

        return redirect('/putusanpn')->with('pesan', 'data barhasil di tambah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PutusanPn $PutusanPn, $id)
    {
        $putusanpn = PutusanPn::where('id', $id)->first();
        // dd($perkara);
        return view('putusanpn.edit', [
            'title' => 'Edit Data',
            'putusanpn' =>  $putusanpn,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $validasi = [
            'nomor_perkara' => [],
            'tanggal' => [],
            'penggugat' => [],
            'tergugat' => [],
            'file' => [],
        ];

        $validateData = $request->validate($validasi);

        if ($request->file('file')) {
            $validateData['file'] =  $request->file('file')->store('file-pn');
        }

        // dd($validateData);

        PutusanPn::where('id', $id)->update($validateData);

        return redirect("/putusanpn")->with('pesan', 'data barhasil di update! silakan cek kembali');
    }
}
