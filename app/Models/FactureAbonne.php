<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FactureAbonne extends Model
{
    use HasFactory;


    public function facture(): BelongsTo
    {
        return $this->belongsTo(FactureAbonne::class, 'patient_abonne_id');
    }

}
