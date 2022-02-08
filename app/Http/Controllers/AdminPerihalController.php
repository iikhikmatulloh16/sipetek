<?php

namespace App\Http\Controllers;

use App\Models\Perihal;
use Illuminate\Http\Request;
use App\Exports\PerihalExport;
use App\Imports\PerihalImport;
use Maatwebsite\Excel\Facades\Excel;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPerihalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.perihals.index', [
            'perihals' => Perihal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.perihals.create');
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
            'name' => 'required|unique:perihals',
            'slug' => 'required|unique:perihals'
        ]);

        Perihal::create($validatedData);
        return redirect('admin/perihals')->with('success', 'Perihal pengaduan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perihal  $perihal
     * @return \Illuminate\Http\Response
     */
    public function show(Perihal $perihal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perihal  $perihal
     * @return \Illuminate\Http\Response
     */
    public function edit(Perihal $perihal)
    {
        return view('dashboards.admins.perihals.edit',[
            'perihal' => $perihal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perihal  $perihal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perihal $perihal)
    {
        $rules = [
            'name' => 'required'
        ];

        if ($request->slug != $perihal->slug) {
            $rules['slug'] = 'required|unique:perihals';
        }

        $validatedData = $request->validate($rules);

        Perihal::where('id', $perihal->id)->update($validatedData);
        return redirect('admin/perihals')->with('success', 'Perihal pengaduan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perihal  $perihal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perihal $perihal)
    {
        Perihal::destroy($perihal->id);
        return redirect('admin/perihals')->with('success', 'Perihal pengaduan berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Perihal::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
    
    public function exportexcel()
    {
        return Excel::download(new PerihalExport, 'DataPerihals.xlsx');
        // return Excel::download(new PerusahaanExport, 'DataPerusahaan.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        
        $namafile = $data->getClientOriginalName();
        $data->move('PerihalsData', $namafile);

        Excel::import(new PerihalImport, \public_path('/PerihalsData/'.$namafile));
        return redirect()->back()->with('success', 'Data perihal berhasil diimport!');
    }
}
