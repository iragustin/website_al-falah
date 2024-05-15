<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPesantren extends Model
{
    use HasFactory;

    protected $table = 'data_pesantren';

    protected $fillable = [
        'jumlah_santri',
        'jumlah_pendidik',
        'jumlah_kependidikan',
        'jumlah_rombongan',
    ];


}
