<?php

namespace App\Http\Livewire\Admin;

use App\Models\PatientType;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class TypePatientPage extends Component
{
    public $state=[],$isEditable=false;
    public $typeToEdit;

    public function resetPRoperties(){
        $this->isEditable=false;
    }

    public function store(){
        Validator::make(
            $this->state,['name'=>'required']
        )->validate();
        PatientType::create($this->state);
        $this->dispatchBrowserEvent('data-added',['message'=>'Type bien créé']);
    }

    public function edit(PatientType $type){
        $this->state=$type->toArray();
        $this->typeToEdit=$type;
        $this->isEditable=true;
    }

    public function delete(PatientType $type){
        $type->delete();
        $this->dispatchBrowserEvent('data-deleted',['message'=>'Type bien retiré']);

    }

    public function update(){
        $this->typeToEdit->name=$this->state['name'];
        $this->typeToEdit->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Abonnement bien mis à jour']);
    }
    public function render()
    {
        $types=PatientType::all();
        return view('livewire.admin.type-patient-page',['types'=>$types]);
    }
}
