<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'contact_number',
        'cancer_type',
        'country',
        'pincode',
        'city',
        'state',
        'address',
    ];

    public function cancer_type()
    {
        return $this->belongsTo(CancerTypes::class,'cancer_type','id');
    }

    public function enquiries1()
    {
        return $this->hasMany(Enquiry::class, 'patient_id', 'id');
    }

    public function enquiries()
    {
        return $this->hasOneThrough(
            Enquiry::class,
            CancerTypes::class,
            'id', // Foreign key on the enquiries table,
            'patient_id', // Foreign key on the patients table
        );
    }

    function doctor(){
        return $this->hasManyThrough(Doctor::class,CancerTypes::class,'id','specialization');
    }

}
