<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'email',
        // 'contact_no',
        'cancer_type',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function cancer_type()
    {
        return $this->belongsTo(CancerTypes::class, 'cancer_type_id', 'id');
    }

    function doctor(){
        return $this->hasManyThrough(Doctor::class,CancerTypes::class,'id','specialization');
    }

}
