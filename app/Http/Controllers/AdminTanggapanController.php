<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
        
        Pengaduan::where('id', $request->pengaduan_id)->update([
            'status' => 'Selesai'
        ]);

        $validatedData = $request->validate([
            'body' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('tanggapan-images');
        }

        $user_id = Auth::user()->id;

        $validatedData['pengaduan_id'] = $request->pengaduan_id;
        $validatedData['user_id'] = $user_id;

        Tanggapan::create($validatedData);
        return redirect('admin/pengaduans')->with('success', 'Pengaduan sudah di proses!');
    }


    // $data = Pengaduan::where('id', $pengaduan->id)->first();
    //     $check = $data->status;

    //     if($check == 'Pending') {
    //         Pengaduan::where('id', $pengaduan->id)->update([
    //             'status' => 'Proses'
    //         ]);
    //     }
    //     return redirect('admin/pengaduans')->with('success', 'Pengaduan akan diproses!');



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::with(['author'])->findorFail($id);

        return view('dashboards.admins.tanggapans.create',[
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggapan $tanggapan)
    {
        //
    }
}
