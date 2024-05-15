<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'info_pendaftaran';

    protected $fillable = [
        'name',
        'address',
        'link',
    ];

}
