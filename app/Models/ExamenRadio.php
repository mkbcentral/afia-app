<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ExamenRadio extends Model
{
    use HasFactory;

    public function facturePrives(): BelongsToMany
    {
        return $this->belongsToMany(FacturePrive::class,
            'examen_radio_facture_prive')->withPivot(['id','qty']);
    }

    public function getPricePriveAttribute($value){
        return $value*2000;
    }

    public function getPriceAbonneAttribute($value){
        return $value*2000;
    }


}
