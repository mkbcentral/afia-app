<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Abonnement extends Model
{
    use HasFactory;

    public function patients(): HasMany
    {
        return $this->hasMany(PatientAbonne::class);
    }
}
