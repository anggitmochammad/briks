<?php

namespace App\Http\Controllers;

use App\Models\peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeralatanController extends Controller
{
    public function index()
    {
        $data['peralatan'] = peralatan::all();
        return view('peralatan.index' , $data);
    }
    public function store(Request $request)
    {
        $this->validate($request , [
            'nama_peralatan' => "required|unique:peralatan,nama_peralatan",
            'lokasi_peralatan' => 'required',
            'merk_peralatan' => 'required',
            'detail_peralatan' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $peralatan = new peralatan;
            $peralatan->kode_peralatan = "PR-".uniqid();
            $peralatan->nama_peralatan = $request->nama_peralatan;
            $peralatan->lokasi = $request->lokasi_peralatan;
            $peralatan->created_by = Auth::user()->id;
            $peralatan->save();
            DB::commit();
            return redirect()->back()->with('success' , "Berhasil Menambahkan Peralatan");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger' , "Terjadi kesalahan");
        }
    }
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $peralatan = peralatan::withoutTrashed()->find($request->id);
            if ($peralatan->trashed()) {
                $peralatan->restore();
                DB::commit();
                return redirect()->back()->with('warning', "Data Berhasil di delete");
            } else {
                $peralatan->delete();
                DB::commit();
                return redirect()->back()->with('warning', "Data Berhasil di delete");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('warning', "Terjadi Kesalahan");
        }
    }
}
