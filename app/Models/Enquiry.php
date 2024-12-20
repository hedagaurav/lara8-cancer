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

    // function user_cancer_details()
    // {
    //     return $this->hasManyThrough(Enquiry::class, Doctor::class, , 'id', 'specialization');
    // }

    function doctor()
    {
        return $this->hasManyThrough(Doctor::class, CancerTypes::class, 'id', 'specialization');
    }
}
