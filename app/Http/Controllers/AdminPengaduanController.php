<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Perusahaan;
use App\Models\Perihal;
use Illuminate\Http\Request;
use App\Models\Tanggapan;
// use Illuminate\Support\Facades\Auth;
// use \Cviebrock\EloquentSluggable\Services\SlugService;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.pengaduans.index', [
            'pengaduans' => Pengaduan::with(['author', 'perusahaan', 'perihal'])->filter(request(['search']))->orderBy('id', 'desc')->paginate(10)->withQueryString()
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
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        // $pengaduan = Pengaduan::where('pengaduan_id', $pengaduan)->first();
        $tanggapan = Tanggapan::where('pengaduan_id', $pengaduan)->first();
        return view('dashboards.admins.pengaduans.detail', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        // return view('dashboards.admins.pengaduans.edit',[
        //     'pengaduan' => $pengaduan,
        //     'perusahaans' => Perusahaan::all(),
        //     'perihals' => Perihal::all()
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        // $check = $request->status;

        // if ($check == 'Pending') {
        //     Pengaduan::where('id', $pengaduan->id)->update([
        //         'status' => 'Proses'
        //     ]);
        // }
        // return redirect('admin/pengaduans')->with('success', 'Pengaduan');

        $data = Pengaduan::where('id', $pengaduan->id)->first();
        $check = $data->status;

        if($check == 'Pending') {
            Pengaduan::where('id', $pengaduan->id)->update([
                'status' => 'Proses'
            ]);
        }
        return redirect('admin/pengaduans')->with('success', 'Pengaduan akan diproses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        // if ($pengaduan->image) {
        //     Storage::delete($pengaduan->image);
        // }
        // if ($pengaduan->tanggapan->image) {
        //     Storage::delete($pengaduan->tanggapan->image);
        // }
        Pengaduan::destroy($pengaduan->id);
        return redirect('admin/pengaduans')->with('success', 'Pengaduan berhasil di hapus!');
    }
}
