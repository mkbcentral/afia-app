<?php

namespace App\Models;

use App\Helpers\Others\DateFromatHelper;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientPrive extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function fiche(): BelongsTo
    {
        return $this->belongsTo(Fiche::class, 'fiche_id');
    }

    protected $casts = [
        'date_of_birth' => 'date:Y-m-d',
    ];

    public function getDateOfBirthAttribute($value){
        return Carbon::parse($value)->toFormattedDate();
    }

    public function getAge($date){
        return (new DateFromatHelper())->getUserAge($date);
    }

    public function facture(): HasOne
    {
        return $this->hasOne(FacturePrive::class);
    }
}
