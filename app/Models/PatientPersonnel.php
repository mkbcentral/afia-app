<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function getDateOfBirthAttribute($value){
        return Carbon::parse($value)->toFormattedDate();
    }
    public function getAge($date){
        return date('Y') - Carbon::createFromFormat('d/m/Y', $date)->format('Y');
    }
}
