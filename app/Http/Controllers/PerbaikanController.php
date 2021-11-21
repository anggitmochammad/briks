<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use App\Models\pegawai;
use App\Models\peralatan;
use App\Models\req_material;
use App\Models\req_perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PerbaikanController extends Controller
{
    public function index()
    {   
        $main = maintenance::select("maintenance.*");
        $main = $main->orWhere('maintenance.status_form',0)->orWhere('maintenance.status_form',1);
        if (Auth::user()->id_role == 3 || Auth::user()->id_role == 1) {
            $main = $main->get();
        }
        if (Auth::user()->id_role == 4) {
            $main = $main->join('request_perbaikan as rp' , 'rp.id_maintenance' , '=' , 'maintenance.id')->get();
        }
        
        $data['main'] = $main;
        return view('perbaikan.index' , $data);
    }
    public function show($id)
    {
        $data['main'] = maintenance::find($id);
        return view('perbaikan.perbaikan' , $data);
    }
    public function store(Request $request)
    {
        $this->validate($request , [
            "judul_perbaikan" => 'required',
            "detail_perbaikan" => 'required'
        ]);
        
        if (isset($request->nama_material) && $request->nama_material != null) {
            $nama_material = array_filter($request->nama_material, fn($value) => !is_null($value) && $value !== '');
        }
        if (isset($request->jumlah_material) && $request->jumlah_material != null) {
            $jumlah_material = array_filter($request->jumlah_material, fn($value) => !is_null($value) && $value !== '');
        }
        DB::beginTransaction();
        try {
            $perbaikan = new req_perbaikan;
            $perbaikan->kode = "REQ-ENG-".uniqid();
            $perbaikan->id_maintenance = $request->id_main;
            $perbaikan->judul = $request->judul_perbaikan;
            $perbaikan->tanggal_request_perbaikan = $request->tgl_main;
            $perbaikan->detail_request_perbaikan = $request->detail_perbaikan;
            $perbaikan->created_by = Auth::user()->id;
            $perbaikan->save();
            $id_last_perbaikan = $perbaikan->id;

            //Maintenance
            $main = maintenance::findOrFail($request->id_main);
            $main->status_form = 1;
            $main->save();
            try {
                foreach ($nama_material as $key => $value) {
                    $material = new req_material;
                    $material->id_request_perbaikan = $id_last_perbaikan;
                    $material->nama_material = $value;
                    $material->jumlah = $jumlah_material[$key];
                    $material->save();
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                return redirect()->back()->with("danger" , "Gagal Input data");
            }
            DB::commit();
            return redirect()->back()->with('success' , "Berhasil menginput data");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger' , "Gagal input data");
        }
    }
    public function update(Request $request)
    {
        $this->validate($request , [
            'departement' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $perbaikan = req_perbaikan::findOrFail($request->id_req_perbaikan);
            $perbaikan->department = $request->departement;
            $perbaikan->ce_by = Auth::user()->id;
            $perbaikan->save();
            DB::commit();
            return redirect()->back()->with('success', "Berhasil");
        } catch (\Throwable $th) {
        }
    }
    public function PrintCE($id)
    {
        $main = maintenance::find($id);
        $user_create = pegawai::find($main->haveOne_to_req_perbaikan->created_by);
        $user_ce_by = pegawai::find($main->haveOne_to_req_perbaikan->ce_by);
        $data['main'] = $main;
        $data['user_create'] = $user_create;
        $data['ce_by'] = $user_ce_by;
        return view('report.Report_ce' , $data);
    }
}
