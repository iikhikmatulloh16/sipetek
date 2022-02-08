<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.admins.perusahaans.index',[
            'perusahaans' => Perusahaan::with(['province', 'regency', 'district', 'village'])->filter(request(['search']))->orderBy('id', 'desc')->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.perusahaans.create' ,[
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all()
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
            'name' => 'required',
            'slug' => 'required|unique:perusahaans',
            'tanggal_berdiri' => 'required',
            'cabangdalam' => 'required',
            'cabangluar' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'pos' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'email' => 'required|string|email:dns|max:255'
        ]);

        Perusahaan::create($validatedData);
        return redirect('admin/perusahaans')->with('success', 'Perusahaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('dashboards.admins.perusahaans.detail', [
            'perusahaan' => $perusahaan,
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('dashboards.admins.perusahaans.edit', [
            'perusahaan' => $perusahaan,
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $rules = [
            'name' => 'required',
            'tanggal_berdiri' => 'required',
            'cabangdalam' => 'required',
            'cabangluar' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'pos' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'email' => 'required|string|email:dns|max:255'
        ];

        if ($request->slug != $perusahaan->slug) {
            $rules['slug'] = 'required|unique:perusahaans';
        }

        $validatedData = $request->validate($rules);

        Perusahaan::where('id', $perusahaan->id)->update($validatedData);
        return redirect('admin/perusahaans')->with('success', 'Perusahaan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $perusahaan)
    {
        Perusahaan::destroy($perusahaan->id);
        return redirect('admin/perusahaans')->with('success', 'Perusahaan berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Perusahaan::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
