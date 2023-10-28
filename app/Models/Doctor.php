<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'degree',
        'biography'
    ];

    public function specializations(){
        return $this->belongsToMany(Specialization::class, 'doctor_specialization','doctor_id','specialization_id');
    }
}
