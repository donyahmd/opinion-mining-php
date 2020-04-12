<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function indexTentang()
    {
        $nama   = 'Doni Ahmad';
        $nim    = '1515015104';
        $kelas  = "C' 2015";

        return view('backend.profil.index', compact('nama', 'nim', 'kelas'));
    }
}
