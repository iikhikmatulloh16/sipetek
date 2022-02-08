<?php

namespace App\Http\Controllers;

use App\Models\Perihal;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.users.pengaduans.index', [
            'pengaduans' => Pengaduan::with(['author', 'perusahaan', 'perihal'])->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.users.pengaduans.create',[
            'perusahaans' => Perusahaan::all(),
            'perihals' => Perihal::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perusahaan_id' => 'required',
            'perihal_id' => 'required',
            'subjek' => 'required|max:255',
            'slug' => 'required|unique:pengaduans',
            'body' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('pengaduan-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit($request->body, 20, '...');

        Pengaduan::create($validatedData);
        return redirect('pengaduans')->with('success', 'Pengaduan berhasil di kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    // public function show(Pengaduan $pengaduan)
    public function show(Pengaduan $pengaduan)
    {
        $tanggapan = Tanggapan::where('pengaduan_id', $pengaduan)->first();
        return view('dashboards.users.pengaduans.detail', [
            'pengaduan' => $pengaduan,
            'perusahaans' => Perusahaan::all(),
            'perihals' => Perihal::all(),
            'tanggapans' => $tanggapan
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
        if ($pengaduan->status == 'Pending') {
            return view('dashboards.users.pengaduans.edit',[
                'pengaduan' => $pengaduan,
                'perusahaans' => Perusahaan::all(),
                'perihals' => Perihal::all()
            ]);
        }
        return redirect()->back()->with('error', 'Halaman tidak bisa diakses');
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
        $rules = [
            'perusahaan_id' => 'required',
            'perihal_id' => 'required',
            'subjek' => 'required|max:255',
            'body' => 'required',
            'image' => 'image|file|max:1024',
        ];

        if ($request->slug != $pengaduan->slug) {
            $rules['slug'] = 'required|unique:pengaduans';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('pengaduan-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit($request->body, 20, '...');

        Pengaduan::where('id', $pengaduan->id)->update($validatedData);
        return redirect('pengaduans')->with('success', 'Pengaduan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->image) {
            Storage::delete($pengaduan->image);
        }
        Pengaduan::destroy($pengaduan->id);
        return redirect('pengaduans')->with('success', 'Pengaduan berhasil di hapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pengaduan::class, 'slug', $request->subjek);
        return response()->json(['slug' => $slug]);
    }
}
