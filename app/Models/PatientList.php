<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'patient_lists';

    protected $fillable = [
        "photo",
        "patient_name",
        "mother_name",
        "date_birth",
        "cpf",
        "cns",
        "cep",
        "zipcode",
        "address",
        "number",
        "supplement",
        "neighborhood",
        "city",
        "state",
    ];

    protected $guarded = ['id'];

}
