<?php

namespace App\Models;

use App\Helpers\Others\DateFromatHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientAbonne extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function fiche(): BelongsTo
    {
        return $this->belongsTo(Fiche::class, 'fiche_id');
    }
    public function abonnement(): BelongsTo
    {
        return $this->belongsTo(Abonnement::class, 'abonnement_id');
    }

    public function facture(): HasOne
    {
        return $this->hasOne(FactureAbonne::class);
    }

    public function getDateOfBirthAttribute($value){
        return Carbon::parse($value)->toFormattedDate();
    }

    public function getAge($date){
        return (new DateFromatHelper())->getUserAge($date);
    }
}
