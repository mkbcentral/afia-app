<?php

namespace App\Models;

use App\Helpers\Others\DateFromatHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientPersonnel extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function fiche(): BelongsTo
    {
        return $this->belongsTo(Fiche::class, 'fiche_id');
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(PersonnelService::class, 'personnel_service_id');
    }
    public function facture(): HasOne
    {
        return $this->hasOne(FacturePersonnel::class);
    }
    //Format date attribute
    public function getDateOfBirthAttribute($value){
        return Carbon::parse($value)->toFormattedDate();
    }
    //Get patient age
    public function getAge($date){
        return (new DateFromatHelper())->getUserAge($date);
    }
}
