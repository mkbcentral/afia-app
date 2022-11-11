<?php

namespace App\Http\Livewire\Tarification;

use App\Models\ExamenRadio;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class RadioPage extends Component
{
    public $isEditable=false,$isTrashed=false,$state=[],$radioToEdit,$radioToDelete,$keySearch="";
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
        $radio=new ExamenRadio();
        $radio->name=$this->state['name'];
        $radio->abreviation=$this->state['abreviation'];
        $radio->price_prive=$this->state['price_prive'];
        $radio->price_abonne=$this->state['price_abonne'];
        $radio->save();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }
    public function mount(){
        $this->state['abreviation']="Aucune";
    }

    public function edit(ExamenRadio $radio){
        $this->state=$radio->toArray();
        $this->isEditable=true;
        $this->radioToEdit=$radio;
    }

    public function update(){
        $this->radioToEdit->name=$this->state['name'];
        $this->radioToEdit->abreviation=$this->state['abreviation'];
        $this->radioToEdit->price_prive=$this->state['price_prive'];
        $this->radioToEdit->price_abonne=$this->state['price_abonne'];
        $this->radioToEdit->update();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien mise à jour !']);
    }

    public function showDeleteDialog(ExamenRadio $radio){
        $this->dispatchBrowserEvent('delete-tarification-dialog');
        $this->radioToDelete=$radio;
    }

    public function delete(){
       if ($this->radioToDelete->changed==true) {
            $this->radioToDelete->changed=false;
       } else {
            $this->radioToDelete->changed=true;
       }
       $this->radioToDelete->update();
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
            $radios=ExamenRadio::where('changed',false)
            ->where('name','like','%'.$this->keySearch.'%')
            ->Where('abreviation','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        } else {
            $radios=ExamenRadio::where('changed',true)
            ->where('name','like','%'.$this->keySearch.'%')
            ->Where('abreviation','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        }

        return view('livewire.tarification.radio-page',['labos'=>$radios]);
    }
}
