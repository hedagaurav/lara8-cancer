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
}
