<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fiche extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function patientPrive(): HasOne
    {
        return $this->hasOne(PatientPrive::class);
    }
    public function patientAbonne(): HasOne
    {
        return $this->hasOne(PatientAbonne::class);
    }
    public function patientPersonnel(): HasOne
    {
        return $this->hasOne(PatientPersonnel::class);
    }
}
