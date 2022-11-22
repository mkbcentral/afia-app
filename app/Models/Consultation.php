<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consultation extends Model
{
    use HasFactory;

    public function facturePrive(): HasOne
    {
        return $this->hasOne(FacturePrive::class);
    }

    public function getPricePRiveAttribute($value){
        return $value*2000;
    }
    public function getPriceAbonneAttribute($value){
        return $value*2000;
    }
}
