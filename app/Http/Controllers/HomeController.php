<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Komentar;
use App\Models\KlasifikasiKomentar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_komentar = Komentar::count();

        $total = KlasifikasiKomentar::count();
        $positif = KlasifikasiKomentar::where('klasifikasi', 'positif')->count();
        $negatif = KlasifikasiKomentar::where('klasifikasi', 'negatif')->count();

        $komentar_negatif_teratas = KlasifikasiKomentar::orderBy('nilai_negatif', 'DESC')->limit(10)->get();

        $persentase_positif = $total == 0 ? 50 : number_format($positif / $total * 100, 2);
        $persentase_negatif = $total == 0 ? 50 : number_format($negatif / $total * 100, 2);

        $tn  = KlasifikasiKomentar::where('klasifikasi', 'negatif')->where('confusion_matrix', 'TN')->count();
        $fp  = KlasifikasiKomentar::where('klasifikasi', 'positif')->where('confusion_matrix', 'FP')->count();
        $fn  = KlasifikasiKomentar::where('klasifikasi', 'negatif')->where('confusion_matrix', 'FN')->count();
        $tp  = KlasifikasiKomentar::where('klasifikasi', 'positif')->where('confusion_matrix', 'TP')->count();

        $confusion_matrix = $this->confusionMatrix($tn, $fp, $fn, $tp);

        return view('backend.beranda.index', compact('total_komentar', 'persentase_positif', 'persentase_negatif', 'komentar_negatif_teratas', 'confusion_matrix'));
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
