<?php

namespace App\Http\Controllers;

use App\Models\berita_acara;
use App\Models\maintenance;
use App\Models\peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BeritaAcaraController extends Controller
{
    public function index()
    {
        $data['berita_acara'] = maintenance::orWhere('status_form', 0)->orWhere('status_form' , 2)->get();
        return view('BeritaAcara.index' , $data);
    }
    public function indexCE()
    {
        $data['berita_acara'] = maintenance::where('status_form' , 2)->get();
        return view('BeritaAcara.indexCE' , $data);
    }
    public function show(Request $request , $id)
    {
        $data['main'] = maintenance::findOrFail($id);
        return view('maintenance.detail', $data);
    }
    public function create(Request $request , $id)
    {
        $data['berita'] = maintenance::findOrFail($id);
        return view('BeritaAcara.create' , $data);
    }
    public function store(Request $request)
    {
        $this->validate($request , [
            'name_b_acara' => 'required',
            'kronologi' => 'required',
            'kode_dokumentasi' => 'required',
            'analisa_masalah' => 'required',
            'rekomendasi' => 'required'
        ]);
        
        DB::beginTransaction();
        try {
            $kode_berita_acara = "BR-".uniqid();
            $push = array(
                'maintenance_id' => $request->main_id,
                'kode_berita_acara' => $kode_berita_acara,
                'nama_berita_acara' => $request->name_b_acara,
                'kronologi' => $request->kronologi,
                'kode_dokumentasi' => $request->kode_dokumentasi,
                'analisa_masalah' => $request->analisa_masalah,
                'rekomendasi' => $request->rekomendasi,
                'created_by' => Auth::user()->id,
                'tanggal_berita_acara' => date('Y-m-d')
            );
            berita_acara::create($push);
            maintenance::findOrFail($request->main_id)->update(['status_form' => 2]);
            
            DB::commit();
            return redirect()->back()->with('success' , 'Berhasil menambah');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger' , 'Gagal!');
        }
    }
    public function CeApprove(Request $request)
    {
        DB::beginTransaction();
        try {
            berita_acara::find($request->berita_acara_id)->update(['status_berita_acara' => 2]);
            DB::commit();
            return redirect('ce/b_acara/update_spec/'.$request->berita_acara_id)->with('success', "Berhasil");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger' , 'Gagal!');
        }
    }
    public function reject(Request $request)
    {
        DB::beginTransaction();
        try {
            $main = maintenance::find($request->id_main);$main->status= 99;$main->save();
            berita_acara::where('maintenance_id' , $request->id_main)->update(['status_berita_acara' => 99]);
            peralatan::find($main->id_peralatan)->update(['status' => 0]);
            $request->session()->flash('success', "Berhasil menolak");
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            $request->session()->flash('success', "Gagal Terjadi Kesalahan menolak");
            return true;
        }
    }
    public function updateSpec(Request $request, $id)
    {
        $data['berita'] = maintenance::findOrFail($id);
        return view('BeritaAcara.updatespec', $data);
    }
    public function updateSpecSave(Request $request)
    {
        DB::beginTransaction();
        try {
            berita_acara::find($request->id_berita)->update(["spesifikasi" => $request->spesifikasi]);
            DB::commit();
            return redirect()->back()->with('success' , "Berhasil update spesifikasi");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger' , "Gagal, Terjadi kesalahan");
        }
    }
}
