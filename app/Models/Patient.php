<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'datapatients';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_patient',
        'age',
        'sex',
        'diagnoses',
        'descOfDiagnoses',
    ];

    public $incrementing = false; // Menyatakan bahwa kolom id bukan auto-increment
    protected $keyType = 'string';
}
