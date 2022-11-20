<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ExamenLabo extends Model
{
    use HasFactory;

    public function facturePrives(): BelongsToMany
    {
        return $this->belongsToMany(FacturePrive::class,
            'examen_labo_facture_prive')->withPivot(['id','qty']);
    }
}
