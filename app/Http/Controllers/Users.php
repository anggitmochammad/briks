<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function registration()
    {
        $role = role::all();
        $data['role'] = $role;
        $data['users'] = pegawai::all();
        return view('auth.register', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_user' => 'required',
            'nip_user' => 'required|unique:user,nip_user',
            'username' => 'required|unique:user,username',
            'password' => 'required',
            'id_role' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $pegawai = new pegawai;
            $pegawai->nama_user = $request->nama_user;
            $pegawai->nip_user = $request->nip_user;
            $pegawai->username = $request->username;
            $pegawai->password = Hash::make($request->password);
            $pegawai->id_role = $request->id_role;
            $pegawai->created_by = Auth::user()->id;
            $pegawai->save();
            DB::commit();
            return redirect()->back()->with('success', "Berhasil Menambahkan Pegawai");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger', "Gagal Menambahkan error: $th");
        }
    }
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = pegawai::withoutTrashed()->find($request->id);
            if ($user->trashed()) {
                $user->deleted_by = Auth::user()->id;
                $user->save();
                $user->restore();
                DB::commit();
                return redirect()->back()->with('warning', "Data Berhasil di delete");
            } else {
                $user->deleted_by = Auth::user()->id;
                $user->save();
                $user->delete();
                DB::commit();
                return redirect()->back()->with('warning', "Data Berhasil di delete");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('warning', "Terjadi Kesalahan $th");
        }
    }
}
