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

        $persentase_positif = $total == 0 ? 50 : number_format($positif / $total * 100, 2);
        $persentase_negatif = $total == 0 ? 50 : number_format($negatif / $total * 100, 2);

        return view('backend.beranda.index', compact('total_komentar', 'positif', 'negatif', 'persentase_positif', 'persentase_negatif'));
    }
}
