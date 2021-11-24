<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use App\Models\peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        $data['main'] = maintenance::all();
        return view('maintenance.index' , $data);
    }
    public function create(Request $request)
    {
        $data['peralatan'] = peralatan::where('status',0)->get();
        return view('maintenance.create' , $data);
    }
    public function store(Request $request)
    {
        $this->validate($request , [
            'peralatan_id' => 'required',
            'tgl_main' => 'required',
            'pelaksana' => 'required',
            'hasil_main' => 'required',
            'judul' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $main = new maintenance;
            $main->judul = $request->judul;
            $main->kode_maintenance = "MAIN-".uniqid();
            $main->id_peralatan = $request->peralatan_id;
            $main->tanggal_maintenance = $request->tgl_main;
            $main->pelaksana_maintenance = $request->pelaksana;
            $main->hasil_maintenance = $request->hasil_main;
            $main->save();
            try {
                $tools = peralatan::find($request->peralatan_id);
                if ($tools->status == 1) {
                    DB::rollBack();
                    return redirect('maintenance')->with('danger' , "Gagal, Alat sedang diperbaiki");
                }
                $tools->status = "1";
                $tools->save();
            } catch (\Throwable $th) {
                DB::rollBack();
            }
            DB::commit();
            return redirect('maintenance')->with('success' , "Berhasil menambahkan");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect('/')->with('danger' , "Terjadi Error");
        }
    }
    public function show(Request $request , $id)
    {
        $data['main'] = maintenance::findOrFail($id);
        // dd($data['main']);
        return view('maintenance.detail' , $data);
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $main = maintenance::findOrFail($id);
            $main->delete();
            $id_peralatan = $main->id_peralatan;
            $tool = peralatan::findOrFail($id_peralatan);
            $tool->status = 0;
            $tool->save();
            DB::commit();
            return redirect()->back()->with('success' , "Berhasil Menghapus");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger' , "Gagal Menghapus");
        }
        
    }
}
