<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PDF;

class AdminLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.laporans.index', [
            'pengaduans' => Pengaduan::with(['author', 'perusahaan', 'perihal'])->where('status', 'Selesai')->orderBy('id', 'desc')->paginate(20)
            // 'pengaduans' => Pengaduan::with(['author', 'perusahaan', 'perihal'])->orderBy('id', 'desc')->paginate(20)
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportpdf()
    {
        $data = Pengaduan::where('status', 'Selesai')->orderBy('id', 'desc')->get();
        // $data = Pengaduan::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('dashboards.admins.laporans.laporanpengaduan-pdf');

        return $pdf->download('Laporan Pengaduan.pdf');
    }
}
