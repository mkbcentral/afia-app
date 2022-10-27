<?php

namespace App\Http\Livewire\Admin;

use App\Models\Abonnement;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class AbonnementPage extends Component
{
    use WithPagination;
    public $state=[],$isEditable=false;
    public $abonnementToEdit;

    public function resetPRoperties(){
        $this->isEditable=false;
    }

    public function store(){
        Validator::make(
            $this->state,['name'=>'required']
        )->validate();
        Abonnement::create($this->state);
        $this->dispatchBrowserEvent('data-added',['message'=>'Abonnement bien créé']);
    }

    public function edit(Abonnement $abonnement){
        $this->state=$abonnement->toArray();
        $this->abonnementToEdit=$abonnement;
        $this->isEditable=true;
    }

    public function delete(Abonnement $abonnement){
        if ($abonnement->patients->isEmpty()) {
            $abonnement->delete();
            $this->dispatchBrowserEvent('data-deleted',['message'=>'Abonnement bien retiré']);
        } else {
            $this->dispatchBrowserEvent('data-updated',['message'=>'Désolé cet abonnement a déjà des patient']);
        }

    }

    public function update(){
        $this->abonnementToEdit->name=$this->state['name'];
        $this->abonnementToEdit->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Abonnement bien mis à jour']);
    }
    public function render()
    {
        $abonnements=Abonnement::with('patients')->get();
        return view('livewire.admin.abonnement-page',['abonnements'=>$abonnements]);
    }
}
