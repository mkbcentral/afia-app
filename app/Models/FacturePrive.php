<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacturePrive extends Model
{
    use HasFactory;

    public function facture(): BelongsTo
    {
        return $this->belongsTo(PatientPrive::class, 'patient_prive_id');
    }
}
