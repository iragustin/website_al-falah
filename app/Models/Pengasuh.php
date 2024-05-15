<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengasuh extends Model
{
    use HasFactory;

    protected $table = 'pengasuh';

    protected $fillable = [
        'name',
        'image',
        'description',
        'position',
    ];

}
