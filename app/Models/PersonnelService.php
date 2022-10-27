<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonnelService extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function patients(): HasMany
    {
        return $this->hasMany(PatientPersonnel::class);
    }
}
