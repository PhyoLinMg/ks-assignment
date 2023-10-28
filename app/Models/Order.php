<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'prescription_id'
    ];

    public function appointment(){
        return $this->hasOne(Appointment::class, 'id','appointment_id');
    }

    public function prescription(){
        return $this->hasOne(Prescription::class, 'id','prescription_id');
    }
}
