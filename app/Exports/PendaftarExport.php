<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PendaftarExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [];

        $tahfidzData = Pendaftar::where('type', 'tahfidz')->get();
        $takhosusData = Pendaftar::where('type', 'takhosus')->get();

        $sheets[] = new PendaftarSheet($tahfidzData, 'Tahfidz');
        $sheets[] = new PendaftarSheet($takhosusData, 'Takhosus');

        return $sheets;
    }
}

class PendaftarSheet implements FromCollection, WithHeadings
{
    protected $data;
    protected $sheetName;

    public function __construct($data, $sheetName)
    {
        $this->data = $data;
        $this->sheetName = $sheetName;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'No. Telepon',
            'Nama Ibu',
            'Nama Ayah',
            'No. Telepon Orang Tua',
            'Email',
            'Alamat',
            'Asal Sekolah',
            'Tipe',
            'Tanggal dibuat',
            'tanggal diubah',
            'Bukti Pembayaran',
            'Status Pembayaran (1=lunas,0=belum lunas)',

        ];
    }

    public function collection()
    {
        return $this->data;
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
