<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;

use App\Models\KlasifikasiKomentar;
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

    public function indexKlasifikasiKomentar()
    {
        $preproses_kosong = false;
        if (KlasifikasiKomentar::count() == 0) {
            $preproses_kosong = true;
        }

        return view('backend.komentar_klasifikasi.index', compact('preproses_kosong'));
    }

    public function dataKlasifikasiKomentar()
    {
        if (request()->ajax()) {
            $klasifikasi = KlasifikasiKomentar::select('komentar_id', 'nilai_positif', 'nilai_negatif', 'klasifikasi')->with('komentar')->get();
            return DataTables::of($klasifikasi)
            ->addColumn('komentar', function ($klasifikasi) {
                return $klasifikasi->komentar->komentar;
            })->editColumn('klasifikasi', function ($klasifikasi) {
                if ($klasifikasi->klasifikasi == 'positif') {
                    return '<span class="badge bg-green">POSITIF</span>';
                } else {
                    return '<span class="badge bg-red">NEGATIF</span>';
                }
            })->escapeColumns([])->make(true);
        } else {
            return response('Forbidden', 403);
        }
    }

    public function tambahKomentar()
    {
        return view('backend.komentar.kelola.tambah');
    }

    public function simpanKomentar(Request $request)
    {
        $request->validate([
            'komentar'  => 'required'
        ]);

        $komentar           = new Komentar();
        $komentar->komentar = $request->komentar;
        $komentar->save();

        return redirect()->route('komentar.index_komentar')->with('success', 'Data komentar berhasil disimpan!');
    }

    public function indexConfusionMatrix(Request $request)
    {
        $confusion_matrix_kosong = false;
        if (KlasifikasiKomentar::count() == 0) {
            $confusion_matrix_kosong = true;
        }

        $tn  = KlasifikasiKomentar::where('klasifikasi', 'negatif')->where('confusion_matrix', 'TN')->count();
        $fp  = KlasifikasiKomentar::where('klasifikasi', 'positif')->where('confusion_matrix', 'FP')->count();
        $fn  = KlasifikasiKomentar::where('klasifikasi', 'negatif')->where('confusion_matrix', 'FN')->count();
        $tp  = KlasifikasiKomentar::where('klasifikasi', 'positif')->where('confusion_matrix', 'TP')->count();

        $confusion_matrix = $this->confusionMatrix($tn, $fp, $fn, $tp);

        return view('backend.confusion_matrix.index', compact('confusion_matrix', 'confusion_matrix_kosong'));
    }

    public function dataConfusionMatrix()
    {
        if (request()->ajax()) {
            $klasifikasi = KlasifikasiKomentar::select('komentar_id', 'klasifikasi', 'confusion_matrix')->with('komentar')->get();
            return DataTables::of($klasifikasi)
            ->addColumn('komentar', function ($klasifikasi) {
                return $klasifikasi->komentar->komentar;
            })->editColumn('klasifikasi', function ($klasifikasi) {
                if ($klasifikasi->klasifikasi == 'positif') {
                    return '<span class="badge bg-green">POSITIF</span>';
                } else {
                    return '<span class="badge bg-red">NEGATIF</span>';
                }
            })->editColumn('confusion_matrix', function ($klasifikasi) {
                if ($klasifikasi->klasifikasi == 'positif' && $klasifikasi->confusion_matrix == 'TP') {
                    return '<span class="badge bg-green">TRUE POSITIF</span>';
                } else if ($klasifikasi->klasifikasi == 'positif' && $klasifikasi->confusion_matrix == 'FP') {
                    return '<span class="badge bg-red">FALSE POSITIF</span>';
                } else if ($klasifikasi->klasifikasi == 'negatif' && $klasifikasi->confusion_matrix == 'TN') {
                    return '<span class="badge bg-green">TRUE NEGATIF</span>';
                } else if ($klasifikasi->klasifikasi == 'negatif' && $klasifikasi->confusion_matrix == 'FN') {
                    return '<span class="badge bg-red">FALSE NEGATIF</span>';
                }
            })->escapeColumns([])->make(true);
        } else {
            return response('Forbidden', 403);
        }
    }

    public function confusionMatrix($tn, $fp, $fn, $tp)
    {
        $presisi    = ($tn / ($tn + $fn)) * 100;
        $recall     = ($tn / ($tn + $fp)) * 100;
        $akurasi    = (($tn + $tp) / ($tn + $tp + $fn + $fp)) * 100;

        $f1_score   = ((2 * ($recall * $presisi)) / ($recall + $presisi));

        return [
            'presisi'   =>  $presisi,
            'recall'    =>  $recall,
            'akurasi'   =>  $akurasi,
            'f1_score'  =>  $f1_score,
        ];
    }
}
