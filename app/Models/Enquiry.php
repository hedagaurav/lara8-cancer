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
        'user_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cancer_detail()
    {
        return $this->belongsTo(CancerTypes::class, 'cancer_type');
    }

    function treatment_details()
    {
        return $this->hasMany(Treatment_plan::class, 'patient_id', 'id');
        // return $this->hasManyThrough(Treatment_plan::class, 'patient_id', 'id');
    }

    function doctor()
    {
        return $this->hasOneThrough(Doctor::class, Treatment_plan::class, 'patient_id', 'id','id','doctor_id');
    }
}
