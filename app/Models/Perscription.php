<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'medicine_id',
        'quantity',
        'note'
    ];

    public function medicine(){
        return $this->hasOne(Medicine::class, 'id','medicine_id');
    }
}
