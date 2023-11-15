<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index()
    {
        return view('admin.laporan.index');
    }
    public function user()
    {
        $data = User::get();
        return view('admin.laporan.user', compact('data'));
    }

    public function bibit()
    {
        $data = Bibit::get();
        return view('admin.laporan.bibit', compact('data'));
    }

    public function stok()
    {
        $data = Bibit::get();
        return view('admin.laporan.stok', compact('data'));
    }

    public function pengajuan()
    {
        $data = Pengajuan::get();
        return view('admin.laporan.pengajuan', compact('data'));
    }

    public function validasi()
    {
        $data = Pengajuan::where('status', 2)->get();
        return view('admin.laporan.validasi', compact('data'));
    }
    public function serahterima()
    {
        $data = Pengajuan::get();
        return view('admin.laporan.serahterima', compact('data'));
    }
}
