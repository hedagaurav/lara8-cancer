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

    public function cancer_type(){
        return $this->belongsTo(CancerTypes::class,'specialization','id');
    }

    public function enquiries()
    {
        return $this->hasManyThrough(
            Enquiry::class,
            CancerTypes::class,
            'id', // Foreign key on the enquiries table
            'cancer_type_id', // Foreign key on the patients table
        );
    }

    function patient(){
        return $this->hasManyThrough(Patient::class,CancerTypes::class,'id','cancer_type');
    }

}
