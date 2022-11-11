<?php

namespace App\Http\Livewire\Tarification;

use App\Models\Acte;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ActePage extends Component
{
    public $isEditable=false,$isTrashed=false,$state=[],$acteToEdit,$acteToDelete,$keySearch="";
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
        $acte=new Acte();
        $acte->name=$this->state['name'];
        $acte->abreviation=$this->state['abreviation'];
        $acte->price_prive=$this->state['price_prive'];
        $acte->price_abonne=$this->state['price_abonne'];
        $acte->save();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }
    public function mount(){
        $this->state['abreviation']="Aucune";
    }

    public function edit(Acte $acte){
        $this->state=$acte->toArray();
        $this->isEditable=true;
        $this->acteToEdit=$acte;
    }

    public function update(){
        $this->acteToEdit->name=$this->state['name'];
        $this->acteToEdit->abreviation=$this->state['abreviation'];
        $this->acteToEdit->price_prive=$this->state['price_prive'];
        $this->acteToEdit->price_abonne=$this->state['price_abonne'];
        $this->acteToEdit->update();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien mise à jour !']);
    }

    public function showDeleteDialog(Acte $acte){
        $this->dispatchBrowserEvent('delete-tarification-dialog');
        $this->acteToDelete=$acte;
    }

    public function delete(){
       if ($this->acteToDelete->changed==true) {
            $this->acteToDelete->changed=false;
       } else {
            $this->acteToDelete->changed=true;
       }
       $this->acteToDelete->update();
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
            $actes=Acte::where('changed',false)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        } else {
            $actes=Acte::where('changed',true)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        }
        return view('livewire.tarification.acte-page',['actes'=>$actes]);
    }
}
