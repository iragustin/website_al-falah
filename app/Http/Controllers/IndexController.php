<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengasuh;
use App\Models\Brosur;
use App\Models\InfoPendaftaran;
use App\Models\DataPesantren;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){
        $berita = Berita::all();
        $pengasuh = Pengasuh::all();

        $pendaftaran = InfoPendaftaran::all();

        $brosur = Brosur::all();

        $data = DataPesantren::first();

        return view('index', [
            'berita' => $berita,
            'pengasuh' => $pengasuh,
            'pendaftaran' => $pendaftaran,
            'brosur' => $brosur,
            'data' => $data,
            'title' => 'Pondok Pesantren Al-Falah'
        ]);
    }

    public function changePassword(){
        $user = User::find(auth()->user()->id);

        return view('adminGantiPassword', [
            'user' => $user,
            'title' => 'Ganti Password'
        ]);
    }

    public function gantiPassword(Request $request){
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($request->password != $request->confirm_password) {
            return redirect('/controlpanel/admin')->with('error', 'Password Tidak Sesuai');
        }

        $user = User::find(auth()->user()->id);
        $user->password = $request->password;
        $user->save();
        return redirect('/controlpanel/admin')->with('success', 'Password Berhasil');
    }

    public function home(){
        return view('admin');
    }
}
