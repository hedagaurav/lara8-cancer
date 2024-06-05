<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancerTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    public function doctors(){
        return $this->hasMany(Doctor::class,'specialization','id');
    }

    public function patients(){
        return $this->hasMany(Patient::class,'cancer_type','id');
    }
}
