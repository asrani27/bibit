<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SerahTerimaController extends Controller
{

    public function pemohon_index()
    {
        $data = Pengajuan::where('user_id', Auth::user()->id)->where('status', 2)->paginate(10);
        return view('pemohon.serahterima.index', compact('data'));
    }
    public function index()
    {
        $data = Pengajuan::where('status', 2)->paginate(10);
        return view('admin.serahterima.index', compact('data'));
    }

    public function tgl_serah_terima(Request $req)
    {
        Pengajuan::find($req->pengajuan_id)->update([
            'tgl_serah_terima' => $req->tgl_serah_terima
        ]);

        Session::flash('success', 'Berhasil diupdate');
        return back();
    }
}
