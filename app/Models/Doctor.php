<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors_list';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'name_pref',
        'clinic_address',
        'contact',
        'email',
        'specialty_ids',
        'img_path',
    ];
}
