<?php

namespace App\Http\Livewire\Patients;

use Livewire\Component;

class PatientPrivePage extends Component
{
    public $state=[],$isEditable;
    public function render()
    {
        return view('livewire.patients.patient-prive-page');
    }
}