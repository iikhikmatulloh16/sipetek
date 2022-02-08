<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Exports\ProvinceExport;
use App\Imports\ProvinceImport;
use Maatwebsite\Excel\Facades\Excel;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class AdminProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.daerah.provinces.index', [
            'provinces' => Province::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.daerah.provinces.create');
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
            'id' => 'required|digits:2|unique:provinces',
            'name' => 'required',
            'slug' => 'required|unique:provinces'
        ]);

        Province::create($validatedData);
        return redirect('admin/provinces')->with('success', 'Provinsi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        return view('dashboards.admins.daerah.provinces.edit', [
            'province' => $province
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $rules = [
            'id' => 'required|digits:2',
            'name' => 'required'
        ];

        if ($request->slug != $province->slug) {
            $rules['slug'] = 'required|unique:provinces';
        }

        $validatedData = $request->validate($rules);

        Province::where('id', $province->id)->update($validatedData);
        return redirect('admin/provinces')->with('success', 'Provinsi berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        Province::destroy($province->id);
        return redirect('admin/provinces')->with('success', 'Provinsi berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Province::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function select(Request $request)
    {
        $provinces = [];

        if ($request->has('q')) {
            $search = $request->q;
            $provinces = Province::select("id", "name")
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $provinces = Province::get();
        }
        return response()->json($provinces);
    }

    // Export & Import
    public function exportexcel()
    {
        return Excel::download(new ProvinceExport, 'DataProvinces.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        
        $namafile = $data->getClientOriginalName();
        $data->move('ProvincesData', $namafile);

        Excel::import(new ProvinceImport, \public_path('/ProvincesData/'.$namafile));
        return redirect()->back()->with('success', 'Data provinsi berhasil diimport!');
    }
}
