<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Exports\RegencyExport;
use App\Imports\RegencyImport;
use Maatwebsite\Excel\Facades\Excel;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminRegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.daerah.regencies.index',[
            'regencies' => Regency::paginate(20)
        ]);
        
    }

    // public function index(Request $request)
    // {
    //     $stores = Store::with(['province', 'regency', 'district', 'village']);

    //     return view('stores.index', [
    //         'stores' => $stores->paginate(5),
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.daerah.regencies.create', [
            'provinces' => Province::all()
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
            'id' => 'required|digits:4|unique:regencies',
            'province_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:regencies'
        ]);

        Regency::create($validatedData);
        return redirect('admin/regencies')->with('success', 'Kabupaten berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function show(Regency $regency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function edit(Regency $regency)
    {
        return view('dashboards.admins.daerah.regencies.edit', [
            'regency' => $regency,
            'provinces' => Province::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regency $regency)
    {
        $rules = [
            'id' => 'required|digits:4',
            'province_id' => 'required',
            'name' => 'required'
        ];

        if ($request->slug != $regency->slug) {
            $rules['slug'] = 'required|unique:regencies';
        }

        $validatedData = $request->validate($rules);

        Regency::where('id', $regency->id)->update($validatedData);
        return redirect('admin/regencies')->with('success', 'Kabupaten berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regency $regency)
    {
        Regency::destroy($regency->id);
        return redirect('admin/regencies')->with('success', 'Kabupaten berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Regency::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function select(Request $request)
    {
        $regencies = [];
        $provinceID = $request->provinceID;
        if ($request->has('q')) {
            $search = $request->q;
            $regencies = Regency::select("id", "name")
                ->where('province_id', $provinceID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $regencies = Regency::where('province_id', $provinceID)->get();
        }
        return response()->json($regencies);
    }

    public function exportexcel()
    {
        return Excel::download(new RegencyExport, 'DataRegencies.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        
        $namafile = $data->getClientOriginalName();
        $data->move('RegenciesData', $namafile);

        Excel::import(new RegencyImport, \public_path('/RegenciesData/'.$namafile));
        return redirect()->back()->with('success', 'Data kabupaten berhasil diimport!');
    }
}
