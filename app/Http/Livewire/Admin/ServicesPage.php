<?php

namespace App\Http\Livewire\Admin;

use App\Models\PersonnelService;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesPage extends Component
{
    use WithPagination;
    public $state=[],$isEditable=false;
    public $serviceToEdit;

    public function resetPRoperties(){
        $this->isEditable=false;
    }

    public function store(){
        Validator::make(
            $this->state,
            [
                'name'=>'required',
            ]
        )->validate();
        PersonnelService::create($this->state);
        $this->dispatchBrowserEvent('data-added',['message'=>'Abonnement bien créé']);
    }

    public function edit(PersonnelService $service){
        $this->state=$service->toArray();
        $this->serviceToEdit=$service;
        $this->isEditable=true;
    }

    public function delete(PersonnelService $service){
        if ($service->patients->isEmpty()) {
            $service->delete();
            $this->dispatchBrowserEvent('data-deleted',['message'=>'Service bien retiré']);
        } else {
            $this->dispatchBrowserEvent('data-updated',['message'=>'Désolé ce service a déjà des patient']);
        }

    }

    public function update(){
        $this->serviceToEdit->name=$this->state['name'];
        $this->serviceToEdit->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Abonnement bien mis à jour']);
    }
    public function render()
    {
        $Services=PersonnelService::paginate(5);
        return view('livewire.admin.services-page');
    }
}
