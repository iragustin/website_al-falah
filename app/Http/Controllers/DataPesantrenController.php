<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPesantren;

class DataPesantrenController extends Controller
{

    public function index()
    {
        $data = DataPesantren::first();
        return view('adminJumlahSantri', [
            'title' => 'Data Pesantren'
        ], [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $data = DataPesantren::first();
        $data->update($request->all());
        return redirect('/controlpanel/admin/jumlahsantri')->with('success', 'Data pesantren berhasil diubah!');
    }

}
