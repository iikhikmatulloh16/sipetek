<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\District;
use Illuminate\Http\Request;
use App\Exports\DistrictExport;
use App\Imports\DistrictImport;
use Maatwebsite\Excel\Facades\Excel;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.daerah.districts.index', [
            'districts' => District::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.daerah.districts.create',[
            'regencies' => Regency::all()
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
            'id' => 'required|digits:7|unique:districts',
            'regency_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:districts'
        ]);

        District::create($validatedData);
        return redirect('admin/districts')->with('success', 'Kecamatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        return view('dashboards.admins.daerah.districts.edit', [
            'district' => $district,
            'regencies' => Regency::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $rules = [
            'id' => 'required|digits:7',
            'regency_id' => 'required',
            'name' => 'required'
        ];

        if ($request->slug != $district->slug) {
            $rules['slug'] = 'required|unique:districts';
        }

        $validatedData = $request->validate($rules);

        District::where('id', $district->id)->update($validatedData);
        return redirect('admin/districts')->with('success', 'Kecamatan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        District::destroy($district->id);
        return redirect('admin/districts')->with('success', 'Kecamatan berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(District::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function select(Request $request)
    {
        $districts = [];
        $regencyID = $request->regencyID;
        if ($request->has('q')) {
            $search = $request->q;
            $districts = District::select("id", "name")
                ->where('regency_id', $regencyID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $districts = District::where('regency_id', $regencyID)->get();
        }
        return response()->json($districts);
    }

    public function exportexcel()
    {
        return Excel::download(new DistrictExport, 'DataDistricts.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        
        $namafile = $data->getClientOriginalName();
        $data->move('DistrictsData', $namafile);

        Excel::import(new DistrictImport, \public_path('/DistrictsData/'.$namafile));
        return redirect()->back()->with('success', 'Data kecamatan berhasil diimport!');
    }
}
