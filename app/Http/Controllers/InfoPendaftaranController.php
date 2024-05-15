<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoPendaftaran;

class InfoPendaftaranController extends Controller
{
    public function index()
    {
        $info_pendaftaran = InfoPendaftaran::all();
        return view('adminInfoPendaftaran', [
            'info_pendaftaran' => $info_pendaftaran,
            'title' => 'Admin - Info Pendaftaran'
        ]);
    }

    public function create()
    {
        return view('tambahInfoPendaftaran', [
            'title' => 'Admin - Tambah Info Pendaftaran'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'link' => 'required',
        ]);
        InfoPendaftaran::create($request->all());

        return redirect('/controlpanel/admin/info-pendaftaran')->with('success', 'Data info pendaftaran berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $info_pendaftaran = InfoPendaftaran::find($id);
        $info_pendaftaran->delete();

        return redirect('/controlpanel/admin/info-pendaftaran')->with('success', 'Data info pendaftaran berhasil dihapus!');
    }

    public function edit($id)
    {
        $info_pendaftaran = InfoPendaftaran::find($id);
        return view('tambahInfoPendaftaran', [
            'info_pendaftaran' => $info_pendaftaran,
            'title' => 'Admin - Edit Info Pendaftaran'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'link' => 'required',
        ]);

        $info_pendaftaran = InfoPendaftaran::find($id);
        $info_pendaftaran->update($request->all());

        return redirect('/controlpanel/admin/info-pendaftaran')->with('success', 'Data info pendaftaran berhasil diubah!');
    }
    
}
