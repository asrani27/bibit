<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StokController extends Controller
{

    public function index()
    {
        $data = Bibit::orderBy('id', 'DESC')->paginate(15);
        return view('admin.stok.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Bibit::find($id);
        return view('admin.stok.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = Bibit::find($id)->update($req->all());
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/stok-bibit');
    }
}
