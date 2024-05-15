<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengasuh;

class PengasuhController extends Controller
{
    public function index()
    {
        $pengasuh = Pengasuh::all();
        return view('adminPengasuh', [
            'pengasuh' => $pengasuh,
            'title' => 'Admin - Pengasuh'
        ]);
    }

    public function create()
    {
        return view('tambahPengasuh' , [
            'title' => 'Admin - Tambah Pengasuh'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'position' => 'required',
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/pengasuh'), $new_name);

        $form_data = array(
            'name' => $request->name,
            'image' => $new_name,
            'description' => $request->description,
            'position' => $request->position,
        );

        Pengasuh::create($form_data);

        return redirect('/controlpanel/admin/pengasuh')->with('success', 'Data pengasuh berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $pengasuh = Pengasuh::find($id);
        $pengasuh->delete();

        $image_path = public_path('images/pengasuh/' . $pengasuh->image);
        if (file_exists($image_path
        )) {
            unlink($image_path);
        }
        $pengasuh->delete();

        return redirect('/controlpanel/admin/pengasuh')->with('success', 'Data pengasuh berhasil dihapus!');
    }

    public function edit($id)
    {
        $pengasuh = Pengasuh::find($id);

        return view('tambahPengasuh', [
            'pengasuh' => $pengasuh,
            'title' => 'Admin - Edit Pengasuh'
        ]);
    }

    public function update(Request $request, $id)
    {
        $pengasuh = Pengasuh::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'position' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pengasuh'), $new_name);

            $old_image_path = public_path('images/pengasuh/' . $pengasuh->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            $form_data = array(
                'name' => $request->name,
                'image' => $new_name,
                'description' => $request->description,
                'position' => $request->position,
            );
        } else {
            $form_data = array(
                'name' => $request->name,
                'description' => $request->description,
                'position' => $request->position,
            );
        }

        $pengasuh->update($form_data);

        return redirect('/controlpanel/admin/pengasuh')->with('success', 'Data pengasuh berhasil diubah!');
    }

    public function show($id)
    {
        $pengasuh = Pengasuh::find($id);
        return view('pengasuh', [
            'pengasuh' => $pengasuh,
            'title' => $pengasuh->name . ' - Detail Pengasuh'
        ]);
    }
}
