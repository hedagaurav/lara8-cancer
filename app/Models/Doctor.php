<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // public function user(){
    //     return $this->morphOne(User::class,'id');
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cancer_type(){
        return $this->belongsTo(CancerTypes::class,'specialization');
    }
}
