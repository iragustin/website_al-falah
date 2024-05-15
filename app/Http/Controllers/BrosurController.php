<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brosur;

class BrosurController extends Controller
{
    public function index()
    {
        $brosurs = Brosur::all();
        return view('adminbrosur', [
            'brosur' => $brosurs,
            'title' => 'Admin - Brosur'
        ]);

    }

    public function create()
    {
        return view('tambahBrosur', [
            'title' => 'Admin - Tambah Brosur'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'back_image' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $back_image = $request->file('back_image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $new_back_name = rand() . '.' . $back_image->getClientOriginalExtension();

        $image->move(public_path('images/brosur'), $new_name);
        $back_image->move(public_path('images/brosur'), $new_back_name);

        Brosur::create([
            'name' => $request->name,
            'image' => $new_name,
            'back_image' => $new_back_name,
            'description' => $request->description,
        ]);
        return redirect('/controlpanel/admin/brosur')->with('success', 'Data brosur berhasil ditambahkan!');

    }

    public function destroy($id)
    {
        $brosur = Brosur::find($id);

        if ($brosur->image) {
            $oldImage = public_path('images/brosur/' . $brosur->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }

        if ($brosur->back_image) {
            $oldBackImage = public_path('images/brosur/' . $brosur->back_image);
            if (file_exists($oldBackImage)) {
                @unlink($oldBackImage);
            }
        }
        
        $brosur->delete();
        return redirect('/controlpanel/admin/brosur')->with('success', 'Data brosur berhasil dihapus!');
    }

    public function edit($id)
    {
        $brosur = Brosur::find($id);
        return view('tambahBrosur', [
            'brosur' => $brosur,
            'title' => 'Admin - Edit Brosur'
        ]);
    }

    public function update(Request $request, $id)
    {
        $brosur = Brosur::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/brosur'), $new_name);
            $brosur->image = $new_name;

            $oldImage = public_path('images/brosur/' . $brosur->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }

        if ($request->hasFile('back-image')) {
            $back_image = $request->file('back-image');
            $new_back_name = rand() . '.' . $back_image->getClientOriginalExtension();
            $back_image->move(public_path('images/brosur'), $new_back_name);
            $brosur->back_image = $new_back_name;

            $oldBackImage = public_path('images/brosur/' . $brosur->back_image);
            if (file_exists($oldBackImage)) {
                @unlink($oldBackImage);
            }
        }
            

        $brosur->name = $request->name;
        $brosur->description = $request->description;
        $brosur->save();

        return redirect('/controlpanel/admin/brosur')->with('success', 'Data brosur berhasil diubah!');
    }
}
