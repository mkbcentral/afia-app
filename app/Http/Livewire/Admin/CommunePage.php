<?php

namespace App\Http\Livewire\Admin;

use App\Models\Commune;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CommunePage extends Component
{
    public $state=[],$isEditable=false;
    public $communeToEdit;

    public function resetPRoperties(){
        $this->isEditable=false;
    }

    public function store(){
        Validator::make(
            $this->state,['name'=>'required']
        )->validate();
        Commune::create($this->state);
        $this->dispatchBrowserEvent('data-added',['message'=>'commune bien créé']);
    }

    public function edit(Commune $commune){
        $this->state=$commune->toArray();
        $this->communeToEdit=$commune;
        $this->isEditable=true;
    }

    public function delete(Commune $commune){
        $commune->delete();
        $this->dispatchBrowserEvent('data-deleted',['message'=>'commune bien retiré']);

    }

    public function update(){
        $this->communeToEdit->name=$this->state['name'];
        $this->communeToEdit->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Abonnement bien mis à jour']);
    }
    public function render()
    {
        $communes=Commune::all();
        return view('livewire.admin.commune-page',['communes'=>$communes]);
    }
}
