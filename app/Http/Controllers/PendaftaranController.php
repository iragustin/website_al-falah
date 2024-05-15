<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftarExport;

class PendaftaranController extends Controller
{
    public function index()
    {
        $takhosus = Pendaftar::where("type", "takhosus")->get();
        $tahfidz = Pendaftar::where("type", "tahfidz")->get();
        return view("adminPendaftar", [
            "takhosus" => $takhosus,
            "tahfidz" => $tahfidz,
            "title" => "Admin - Pendaftar"
        ]);
    }

    public function create()
    {
        return view("pendaftaran", [
            "title" => "Pendaftaran"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "gender" => "required",
            "birth_place" => "required",
            "birth_date" => "required",
            "phone" => "required",
            "mother_name" => "required",
            "father_name" => "required",
            "parent_phone" => "required",
            "email" => "required",
            "address" => "required",
            "school_origin" => "required",
            "type" => "required",
        ]);

        if ($request->hasFile("payment_proof")) {
            $file = $request->file("payment_proof");
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path("images/payment_proof"), $fileName);
            $form_data = array(
                "name" => $request->name,
                "gender" => $request->gender,
                "birth_place" => $request->birth_place,
                "birth_date" => $request->birth_date,
                "phone" => $request->phone,
                "mother_name" => $request->mother_name,
                "father_name" => $request->father_name,
                "parent_phone" => $request->parent_phone,
                "email" => $request->email,
                "address" => $request->address,
                "school_origin" => $request->school_origin,
                "type" => $request->type,
                "payment_proof" => $fileName
            );

            Pendaftar::create($form_data);
        } else {
            $form_data = array(
                "name" => $request->name,
                "gender" => $request->gender,
                "birth_place" => $request->birth_place,
                "birth_date" => $request->birth_date,
                "phone" => $request->phone,
                "mother_name" => $request->mother_name,
                "father_name" => $request->father_name,
                "parent_phone" => $request->parent_phone,
                "email" => $request->email,
                "address" => $request->address,
                "school_origin" => $request->school_origin,
                "type" => $request->type
            );
            Pendaftar::create($form_data);  
        }
        return redirect("/")->with("success", "Data pendaftar berhasil ditambahkan!");

    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();

        if ($pendaftar->payment_proof) {
            $image_path = public_path("payment_proof/" . $pendaftar->payment_proof);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $pendaftar->delete(); 

        return redirect("/admin/pendaftar")->with("success", "Data pendaftar berhasil dihapus!");
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::find($id);
        return view("pendaftar", [
            "pendaftar" => $pendaftar,
            "title" => "Pendaftar"
        ]);
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::find($id);
        return view("tambahPendaftar", [
            "pendaftar" => $pendaftar,
            "title" => "Admin - Edit Pendaftar"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "gender"=> "required",
            "birth_place" => "required",
            "birth_date" => "required",
            "phone" => "required",
            "mother_name" => "required",
            "father_name" => "required",
            "parent_phone" => "required",
            "email" => "required",
            "address" => "required",
            "school_origin" => "required",
            "type" => "required",
        ]);
        $pendaftar = Pendaftar::find($id);
        $pendaftar->update($request->all());
        return redirect("/controlpanel/admin/pendaftar")->with("success", "Data pendaftar berhasil diubah!");

    }

    public function export()
    {
        return Excel::download(new PendaftarExport, "list-pendaftar-santri-takhosus-tahfidz.xlsx");
    }

    public function createPembayaran()
    {
        return view("pendaftaranBukti", [
            "title" => "Pembayaran"
        ]);
    }

    public function storePembayaran(Request $request)
    {
        
        $request->validate([
            "name" => "required",
            "payment_proof" => "required",
        ]);
        $pendaftar = Pendaftar::whereRaw("LOWER(name) = ?", [strtolower($request->name)])->first();

        if (!$pendaftar) {
            return redirect("/bukti-pembayaran")->with("error", "Data pendaftar tidak ditemukan!");
        }

        if ($pendaftar->is_paid) {
            return redirect("/bukti-pembayaran")->with("error", "Data pendaftar sudah lunas!");
        }

        if ($pendaftar->payment_proof) {
            $image_path = public_path("images/payment_proof/" . $pendaftar->payment_proof);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $file = $request->file('payment_proof');
        $fileName = $pendaftar->id . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/payment_proof'), $fileName);

        $pendaftar->update([
            "payment_proof" => $fileName
        ]);

        return redirect("/bukti-pembayaran")->with("success", "Data pendaftar berhasil diubah!");
    }

    public function editStatus($id)
    {
        $pendaftar = Pendaftar::find($id);

        if ($pendaftar->is_paid) {
            $pendaftar->update([
                "is_paid" => false
            ]);
        } else {
            $pendaftar->update([
                "is_paid" => true
            ]);
        }

        return redirect("/controlpanel/admin/pendaftar")->with("success", "Status pembayaran berhasil diubah!");
    }

    public function checkStatus()
    {
        $pendaftar = Pendaftar::all();
        return view("pendaftaranStatus", [
            "pendaftar" => $pendaftar,
            "title" => "Cek Status Pembayaran",
        ]);
    }


}
