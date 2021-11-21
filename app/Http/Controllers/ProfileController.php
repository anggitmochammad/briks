<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.profile');
    }
    public function update(Request $request)
    {
        $this->validate($request , [
            'file_upload' => 'mimes:jpg,jpeg,png|max:1000|dimensions:max_width=150,max_height=150'
        ]);

        DB::beginTransaction();
        try {
            $pegawai = pegawai::findOrFail(Auth::user()->id);
            if ($request->has('file_upload')) {
                $file = $request->file_upload;
                $nameFile = time().$file->getClientOriginalName();
                $path = public_path('uploads/ttd');
                $file->move($path , $nameFile);
                $pegawai->file_ttd = $nameFile;
            }
            $pegawai->username = $request->username;
            $pegawai->save();
            DB::commit();
            return redirect()->back()->with('success' , "Berhasil");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger' , "Gagal");
        }
    }
}
