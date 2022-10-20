<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientPrive extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function fiche(): BelongsTo
    {
        return $this->belongsTo(Fiche::class, 'fiche_id');
    }
}
