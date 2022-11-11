<?php

namespace App\Http\Livewire\Tarification;

use App\Models\Sejour;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class SejourPage extends Component
{
    public $isEditable=false,$isTrashed=false,$state=[],$sejourToEdit,$sejourToDelete,$keySearch="";
    protected $listeners=['tarificationListener'=>'delete'];
    public function resetPropreties(){
        $this->isEditable=false;
        $this->state['name']='';
        $this->state['abreviation']='Aucune';
        $this->state['price_prive']='';
        $this->state['price_abonne']='';
    }

    public function store(){
        Validator::make(
            $this->state,
            [
                'name'=>'required',
                'price_prive'=>'required|numeric',
                'price_abonne'=>'required|numeric',
            ]

        )->validate();
        $sejour=new Sejour();
        $sejour->name=$this->state['name'];
        $sejour->abreviation=$this->state['abreviation'];
        $sejour->price_prive=$this->state['price_prive'];
        $sejour->price_abonne=$this->state['price_abonne'];
        $sejour->save();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }
    public function mount(){
        $this->state['abreviation']="Aucune";
    }

    public function edit(Sejour $sejour){
        $this->state=$sejour->toArray();
        $this->isEditable=true;
        $this->sejourToEdit=$sejour;
    }

    public function update(){
        $this->sejourToEdit->name=$this->state['name'];
        $this->sejourToEdit->abreviation=$this->state['abreviation'];
        $this->sejourToEdit->price_prive=$this->state['price_prive'];
        $this->sejourToEdit->price_abonne=$this->state['price_abonne'];
        $this->sejourToEdit->update();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien mise à jour !']);
    }

    public function showDeleteDialog(Sejour $sejour){
        $this->dispatchBrowserEvent('delete-tarification-dialog');
        $this->sejourToDelete=$sejour;
    }

    public function delete(){
       if ($this->sejourToDelete->changed==true) {
            $this->sejourToDelete->changed=false;
       } else {
            $this->sejourToDelete->changed=true;
       }
       $this->sejourToDelete->update();
       $this->dispatchBrowserEvent('data-dialog-deleted',['message'=>"Action réalisée avec succès !"]);
    }
    public function getTrashed(){
        $this->isTrashed=true;
    }

    public function refreshDate(){
        $this->isTrashed=false;
    }
    public function render()
    {
        if ($this->isTrashed==false) {
            $sejours=Sejour::where('changed',false)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        } else {
            $sejours=Sejour::where('changed',true)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        }
        return view('livewire.tarification.sejour-page',['sejours'=>$sejours]);
    }
}
