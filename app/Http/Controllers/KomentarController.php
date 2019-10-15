<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.komentar.index');
    }

    /**
     * Melempar data ke dalam DataTables.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        if (request()->ajax()) {
            $komentar = Komentar::select('komentar')->get();
            return Datatables::of($komentar)->make(true);
        } else {
            return response('Forbidden', 403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komentar $komentar)
    {
        //
    }
}
