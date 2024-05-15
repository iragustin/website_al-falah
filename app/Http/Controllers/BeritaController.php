<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::all();
        return view('adminBerita', [
            'berita' => $berita,
            'title' => 'Admin - Berita'
        ]);
    }
    public function show($slug){
        $berita = Berita::where('slug', $slug)->first();
        return view('berita', [
            'berita' => $berita,
            'title' => 'Berita - ' . $berita->title
        ]);
    }

    public function create(){
        return view('tambahBerita');
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);
        $image = $request->file('foto');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/berita'), $new_name);
        $slug = strtolower($request->judul);
        $slug = preg_replace('/\s+/', '-', $slug);

        $form_data = array(
            'title' => $request->judul,
            'author' => $request->author,
            'date' => $request->tanggal,
            'content' => $request->isi,
            'image' => $new_name,
            'slug' => $slug
        );
        Berita::create($form_data);
        return redirect('/controlpanel/admin/berita')->with('success', 'Data berhasil ditambahkan');
        
    }

    public function destroy($id){
        $berita = Berita::find($id);

        $image_path = public_path('images/berita/' . $berita->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $berita->delete();
        return redirect('/controlpanel/admin/berita')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id){
        $berita = Berita::find($id);
        return view('tambahBerita', [
            'berita' => $berita,
            'title' => 'Admin - Edit Berita'
        ]);
    }

    public function update(Request $request, $id){
        $berita = Berita::find($id);
        $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
        ]);

       if($request->hasFile('foto')){
            $image = $request->file('foto');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/berita'), $new_name);

            $old_image = public_path('images/berita/' . $berita->image);
            if (file_exists($old_image)) {
                unlink($old_image);
            }

            $form_data = array(
                'title' => $request->judul,
                'author' => $request->author,
                'date' => $request->tanggal,
                'content' => $request->isi,
                'image' => $new_name
            );
        }else{
            $form_data = array(
                'title' => $request->judul,
                'author' => $request->author,
                'date' => $request->tanggal,
                'content' => $request->isi
            );
        }

        $slug = strtolower($request->judul);
        $slug = preg_replace('/\s+/', '-', $slug);
        $form_data['slug'] = $slug;
        
        $berita->update($form_data);
        return redirect('/controlpanel/admin/berita')->with('success', 'Data berhasil diperbarui');
    }
}
