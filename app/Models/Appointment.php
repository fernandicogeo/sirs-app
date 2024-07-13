<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment_list';
    public $timestamps = false;

    protected $fillable = [
        'doctor_id',
        'email',
        'patient_id',
        'schedule',
        'status',
    ];
}
