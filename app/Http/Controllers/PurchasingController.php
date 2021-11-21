<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use App\Models\peralatan;
use App\Models\req_material;
use App\Models\req_perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class PurchasingController extends Controller
{
    public function index()
    {
        $purchasing = req_perbaikan::all();
        $data['main'] = $purchasing;
        return view('purchasing.index' , $data);
    }
    public function show($id)
    {
        $purchasing = req_perbaikan::findOrFail($id);
        $data['main'] = $purchasing;
        return view('purchasing.detail' , $data);
    }
    public function pembayaran(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->id_material as $key => $value) {
                $harga = str_replace('.' , '' , $request->harga_material[$key]);
                $material = req_material::findOrFail($value);
                $material->harga = $harga;
                $material->status_material = 0;
                $material->save();
            }
            try {
                $maintenance = maintenance::findOrFail($request->id_maintenance);
                $maintenance->status = 0;
                $maintenance->save();
                $last_main = $maintenance->id_peralatan;
                $lat_main1 = $maintenance->id;
                try {
                    $tools = peralatan::findOrFail($last_main);
                    $tools->status = 0;
                    $tools->save();
                    try {
                        $perbaikan = req_perbaikan::where('id_maintenance' , '=' , $lat_main1)->first();
                        $perbaikan->status_request_perbaikan = 0;
                        $perbaikan->save();
                    } catch (\Throwable $th) {
                        DB::rollBack();
                        return redirect('purchasing')->with("danger" , "Gagal, Terjadi Kesalahan");
                    }
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return redirect('purchasing')->with("danger" , "Gagal, Terjadi Kesalahan");
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                return redirect('purchasing')->with("danger" , "Gagal, Terjadi Kesalahan");
            }
            DB::commit();
            return redirect()->back()->with("success" , "Berhasil Melakukan Pembayaran");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('purchasing')->with("danger" , "Gagal, Terjadi Kesalahan");
        }
    }
    public function print_invoice($id)
    {
        // dd($id);
        $data['invoice'] = req_perbaikan::findOrFail($id);
        return view('report.invoicematerial' , $data);
    }
}
