<?php

namespace App\Http\Controllers;

use App\Models\AkteMati;
use App\Models\AkteLahir;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\KelurahanDesa;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        if (request('cari_nama') != '') {
            $cari_nama = request('cari_nama');
        } else {
            $cari_nama = NULL;
        }

        $user_id = $request->session()->get('user_id');
        $aktelahir = AkteLahir::with(['kelurahan_ref', 'kecamatan_ref', 'user_ref']);

        if (auth()->user()->level == 1) {
            $aktelahir->where('user_id', $user_id);
        }

        if (auth()->user()->level == 3 or auth()->user()->level == 4) {
            $aktelahir->where('status_akte', 3);
        }

        // $total_berkas = $aktelahir->count();
        // $total_berkas_capil = $aktelahir->where('status_akte', 3)->count();
        // $total_berkas_bpjs = $aktelahir->where('status_bpjs', 1)->count();
        // $total_berkas_dinsos = $aktelahir->where('status_dinsos', 1)->count();

        // dd($aktelahir->orderBy('tanggal_lahir', 'asc')->get());

        return view('lahir.index', [
            'title' => 'Data Kelahiran',
            // 'select_kecamatan' => $select_kecamatan,
            // 'select_kelurahandesa' => $select_kelurahandesa,
            // 'cari_nama' => $cari_nama,
            'aktelahir' => $aktelahir->orderBy('tanggal_lahir', 'asc')->get(),
            'total_berkas' => $aktelahir->count(),
            'total_capil' =>  $aktelahir->where('status_akte', 3)->count(),
            'total_bpjs' => $aktelahir->where('status_bpjs', 1)->count(),
            'total_dinsos' => $aktelahir->where('status_dinsos', 1)->count(),
        ]);
    }

    public function dash()
    {
        if (auth()->user()->level == 1) {
            $akte_lahir = AkteLahir::where('user_id', auth()->user()->id);
        } else {
            $akte_lahir = AkteLahir::all();
        }

        $total_berkas = $akte_lahir->count();
        $total_berkas_capil = $akte_lahir->where('status_akte', 3)->count();
        $total_berkas_bpjs = $akte_lahir->where('status_bpjs', 1)->count();
        $total_berkas_dinsos = $akte_lahir->where('status_dinsos', 1)->count();

        // dd($total_berkas_capil);

        return view('lahir.dash', [
            'title' => 'Welcome',
            'total_berkas' => $total_berkas,
            'total_capil' => $total_berkas_capil,
            'total_bpjs' => $total_berkas_bpjs,
            'total_dinsos' => $total_berkas_dinsos,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show_rs($id)
    {
        $akteLahir = AkteLahir::with(['kelurahan_ref', 'kecamatan_ref', 'user_ref'])->where('id', $id)->first();

        // dd($akteLahir);
        return view('lahir.show_rs', [
            'title' => 'Detail Kelahiran',
            'aktelahir' => $akteLahir,
        ]);
    }

    public function create(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $kecamatan = Kecamatan::where('kode_kab', 7171)->get();
        // dd(KelurahanDesa::all());

        return view('lahir.create', [
            'title' => 'Tambah Data Kelahiran',
            'jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'anak_ke' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'jumlah_anggota_kk' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'kecamatan' => $kecamatan,
            'user_id' => $user_id
        ]);

        // $request->file( 'image')->store( 'post-images');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = [
            'no_kk' => ['required'],
            'nama_ibu' => ['required'],
            'nama_anak' => ['required'],
            'email' => ['required', 'email'],
            'anak_ke' => ['required'],
            'jenis_kelamin' => ['required'],
            'tanggal_lahir' => ['required'],
            'panjang_bayi' => ['required'],
            'berat_bayi' => ['required'],
            // 'kelurahan_desa' => ['required'],
            // 'kecamatan' => ['required'],
        ];

        $validasi['file_surat_lahir'] = ['required', 'image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];
        $validasi['file_kartu_keluarga'] = ['required', 'image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];

        if ($request->file('file_akte_nikah')) {
            $validasi['file_akte_nikah'] = ['image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];
        }

        // if ($request->file('file_sptjm')) {
        //     $validasi['file_sptjm'] = ['image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];
        // }

        $validateData = $request->validate($validasi);

        $validateData['file_surat_lahir'] =  $request->file('file_surat_lahir')->store('surat-keterangan-lahir');
        $validateData['file_kartu_keluarga'] =  $request->file('file_kartu_keluarga')->store('kartu-keluarga');

        if ($request->file('file_akte_nikah')) {
            $validateData['akte_nikah'] = $request->file('file_akte_nikah')->store('akte_nikah');
        }

        // if ($request->file('file_sptjm')) {
        //     $validateData['file_sptjm'] = $request->file('file_akte_nikah')->store('sptjm-kelahiran');
        // }

        $validateData['waktu_input_rs_kelurahan'] = date("Y-d-m H:i:s");
        $validateData['status_akte'] = 1;

        $validateData['user_id'] = $request->session()->get('user_id');
        $validateData['kelurahan'] = $request->post('kelurahan_desa');
        $validateData['kecamatan'] = $request->post('kecamatan');
        // $validateData['strtime_tanggal_lahir'] = strtotime($validateData['tanggal_lahir']);

        // dd($validateData);

        AkteLahir::create($validateData);

        return redirect('/kelahiran')->with('pesan', 'data barhasil di tambah');
    }

    public function edit(Request $request, $id)
    {
        $akte = AkteLahir::with(['kelurahan_ref', 'kecamatan_ref', 'user_ref'])->where('id', $id)->first();
        $user_level = $request->session()->get('level');

        if ($user_level == 1) {
            $edit = 'lahir.edit_rs_kel';
        }
        if ($user_level == 2) {
            $edit = 'lahir.edit_capil';
        }
        if ($user_level == 3) {
            $edit = 'lahir.edit_bpjs';
        }
        if ($user_level == 4) {
            $edit = 'lahir.edit_dinsos';
        }

        // dd($akte);

        return view($edit, [
            'title' => 'Edit Data Kelahiran',
            'jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'anak_ke' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'aktelahir' => $akte
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, AkteLahir $akteLahir, $id)
    {
        // dd($request);

        if ($request->file('file_kk_baru')) {
            $validasi['file_kk_baru'] = ['required', 'file', 'mimes:pdf', 'max:5024'];
        }

        if ($request->file('file_akte_lahir')) {
            $validasi['file_akte_lahir'] = ['required', 'file', 'mimes:pdf', 'max:5024'];
        }

        if ($request->file('file_file_kk_baru') || $request->file('file_akte_lahir')) {
            $validateData = $request->validate($validasi);
        }

        if ($request->file('file_kk_baru')) {
            $validateData['file_kk_baru'] = $request->file('file_kk_baru')->store('file_kk_baru');
        }

        if ($request->file('file_akte_lahir')) {
            $validateData['file_akte_lahir'] = $request->file('file_akte_lahir')->store('file_akte_lahir');
        }

        if ($request->post('catatan_capil')) {
            $validasi['catatan_capil'] = $request->post('catatan_capil');
        }

        if (auth()->user()->level == 2) {
            $validateData['status_akte'] = $request->post('status_akte');
            $validateData['catatan_capil'] = $request->post('catatan_capil');
        }

        if (auth()->user()->level == 3) {
            $validateData['status_bpjs'] = $request->post('status_bpjs');
        }

        if (auth()->user()->level == 4) {
            $validateData['status_dinsos'] = $request->post('status_dinsos');
        }

        if (auth()->user()->level == 1) {
            $validasi = [
                'no_kk' => ['required'],
                'nama_ibu' => ['required'],
                'nama_anak' => ['required'],
                'email' => ['required', 'email'],
                'anak_ke' => ['required'],
                'jenis_kelamin' => ['required'],
                'tanggal_lahir' => ['required'],
            ];

            if ($request->file('file_surat_lahir')) {
                $validasi['file_surat_lahir'] = ['image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];
            }

            if ($request->file('file_kartu_keluarga')) {
                $validasi['file_kartu_keluarga'] = ['image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];
            }

            if ($request->file('file_akte_nikah')) {
                $validasi['file_akte_nikah'] = ['image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];
            }

            // if ($request->file('file_sptjm')) {
            //     $validasi['file_sptjm'] = ['image', 'file', 'mimes:jpeg,png,jpg', 'max:5024'];
            // }

            $validateData = $request->validate($validasi);

            if ($request->file('file_surat_lahir')) {
                $validateData['file_surat_lahir'] = $request->file('file_surat_lahir')->store('file_surat_lahir');
            }

            if ($request->file('file_kartu_keluarga')) {
                $validateData['file_kartu_keluarga'] = $request->file('imafile_surat_lahirge')->store('file_surat_lahir');
            }

            if ($request->file('file_akte_nikah')) {
                $validateData['file_akte_nikah'] = $request->file('file_akte_nikah')->store('file_akte_nikah');
            }

            // if ($request->file('file_sptjm')) {
            //     $validateData['file_sptjm'] = $request->file('image')->store('file_surat_lahir');
            // }

            $validateData['status_akte'] = 1;
        }

        // dd($validateData);

        AkteLahir::where(
            'id',
            $id
        )->update($validateData);


        return redirect("/kelahiran/$akteLahir->id")->with('pesan', 'data barhasil di ubah');
    }


    public function getKelurahanDesa($kecamatan_id = 0)
    {
        $data['data'] = KelurahanDesa::orderby("nama", "asc")
            ->where('parent_id', $kecamatan_id)
            ->get();

        // $data['data'] = 'test';
        return response()->json($data);
    }


    // public function getKelurahanDesa($wilayah_id = 0)
    // {
    //     $data['data'] = KelurahanDesa::orderby("nama", "asc")
    //         ->where('parent_id', $wilayah_id)
    //         ->get();
    //     // $data['data'] = $wilayah_id;
    //     return response()->json($data);
    // }

    // if (request('kecamatan') != '') {
    //     $get_kecamatan = Kecamatan::firstWhere('id', request('kecamatan'));
    //     $select_kecamatan = [
    //         'id' => $get_kecamatan->id,
    //         'nama' => $get_kecamatan->nama,
    //     ];
    // } else {
    //     $select_kecamatan = Kecamatan::where('kode_kec', 7171)->get();
    // }

    // if (request('kelurahandesa') != '') {
    //     $get_kelurahandesa = KelurahanDesa::firstWhere('id', request('kelurahandesa'));
    //     $select_kelurahandesa = [
    //         'id' => $get_kelurahandesa->id,
    //         'nama' => $get_kelurahandesa->nama,
    //     ];
    // } else {
    //     $select_kelurahandesa = NULL;
    // }
}
