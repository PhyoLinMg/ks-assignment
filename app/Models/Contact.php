<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'contact_type_id',
    ];


    public function contactType()
    {
        return $this->hasOne(ContactType::class,'id','contact_type_id');
    }
}
