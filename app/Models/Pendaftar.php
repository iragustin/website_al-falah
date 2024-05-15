<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $fillable = [
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'phone',
        'mother_name',
        'father_name',
        'parent_phone',
        'email',
        'address',
        'school_origin',
        'type',
        'payment_proof',
        'is_paid',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function getBirthDateAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }

}


