<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiKomentar;
use DataTables;
use App\Models\Komentar;

class KomentarController extends Controller
{

    public function indexKomentar()
    {
        return view('backend.komentar.index');
    }

    public function dataKomentar()
    {
        if (request()->ajax()) {
            $komentar = Komentar::select('komentar')->get();
            return Datatables::of($komentar)->make(true);
        } else {
            return response('Forbidden', 403);
        }
    }

    public function indexPreprosesKomentar()
    {
        $preproses_kosong = false;
        if (KlasifikasiKomentar::count() == 0) {
            $preproses_kosong = true;
        }

        return view('backend.komentar_preproses.index', compact('preproses_kosong'));
    }

    public function dataPreprosesKomentar()
    {
        if (request()->ajax()) {
            $klasifikasi = KlasifikasiKomentar::select('komentar_id', 'preproses_komentar')->with('komentar')->get();
            return DataTables::of($klasifikasi)
            ->addColumn('komentar', function ($klasifikasi) {
                return $klasifikasi->komentar->komentar;
            })->make(true);
        } else {
            return response('Forbidden', 403);
        }
    }
}
