<?php

namespace App\Models;

use App\Helpers\Facture\Prive\FacturePriveAmountHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FacturePrive extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(PatientPrive::class, 'patient_prive_id');
    }

    public function consultation(): BelongsTo
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }

    public function examenLabos(): BelongsToMany
    {
        return $this->belongsToMany(
            ExamenLabo::class,
            'examen_labo_facture_prive')->withPivot(['id','qty']);
    }

    public function examenRadios(): BelongsToMany
    {
        return $this->belongsToMany(
            ExamenRadio::class,
            'examen_radio_facture_prive')->withPivot(['id','qty']);
    }

    public function examenEchoes(): BelongsToMany
    {
        return $this->belongsToMany(
            Echographie::class,
            'echographie_facture_prive')->withPivot(['id','qty']);
    }

    public function actes(): BelongsToMany
    {
        return $this->belongsToMany(
            Acte::class,
            'acte_facture_prive')->withPivot(['id','qty']);
    }

    public function autres(): BelongsToMany
    {
        return $this->belongsToMany(
            Autre::class,
            'autre_facture_prive')->withPivot(['id','qty']);
    }

    public function getTotal($id){
        return (new FacturePriveAmountHelper())->getFactureAmout($id);
    }


}
