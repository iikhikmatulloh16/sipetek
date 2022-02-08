<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;
use App\Exports\VillageExport;
use App\Imports\VillageImport;
use Maatwebsite\Excel\Facades\Excel;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminVillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.daerah.villages.index', [
            'villages' => Village::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.daerah.villages.create', [
            'districts' => District::all()
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
            'id' => 'required|digits:10|unique:villages',
            'district_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:villages'
        ]);

        Village::create($validatedData);
        return redirect('admin/villages')->with('success', 'Kelurahan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        return view('dashboards.admins.daerah.villages.edit',[
            'village' => $village,
            'districts' => District::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        $rules = [
            'id' => 'required|digits:10',
            'district_id' => 'required',
            'name' => 'required'
        ];

        if ($request->slug != $village->slug) {
            $rules['slug'] = 'required|unique:villages';
        }

        $validatedData = $request->validate($rules);

        Village::where('id', $village->id)->update($validatedData);
        return redirect('admin/villages')->with('success', 'Kelurahan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        Village::destroy($village->id);
        return redirect('admin/villages')->with('success', 'Kelurahan berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Village::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function select(Request $request)
    {
        $villages = [];
        $districtID = $request->districtID;
        if ($request->has('q')) {
            $search = $request->q;
            $villages = Village::select("id", "name")
                ->where('district_id', $districtID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $villages = Village::where('district_id', $districtID)->get();
        }
        return response()->json($villages);
    }

    public function exportexcel()
    {
        return Excel::download(new VillageExport, 'DataVillages.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        
        $namafile = $data->getClientOriginalName();
        $data->move('VillagesData', $namafile);

        Excel::import(new VillageImport, \public_path('/VillagesData/'.$namafile));
        return redirect()->back()->with('success', 'Data kelurahan berhasil diimport!');
    }
}
