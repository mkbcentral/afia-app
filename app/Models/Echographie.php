<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Echographie extends Model
{
    use HasFactory;

    public function facturePrives(): BelongsToMany
    {
        return $this->belongsToMany(
            FacturePrive::class,
            'echographie_facture_prive'
        )->withPivot(['id','qty']);
    }

    public function getPricePRiveAttribute($value){
        return $value*2000;
    }
    public function getPriceAbonneAttribute($value){
        return $value*2000;
    }
}
