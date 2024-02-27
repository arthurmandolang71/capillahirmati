<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadFileController extends Controller
{
    //
    public function lahir()
    {
        return view('filedownload.lahir', [
            'title' => 'Donwload File',
        ]);
    }

    public function mati()
    {
        return view('filedonwload.mati', [
            'title' => 'Donwload File',
        ]);
    }
}
