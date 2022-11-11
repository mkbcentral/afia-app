<?php

namespace App\Http\Livewire\Tarification;

use App\Models\Autre;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AutrePage extends Component
{
    public $isEditable=false,$isTrashed=false,$state=[],$autreToEdit,$autreToDelete,$keySearch="";
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
        $autre=new Autre();
        $autre->name=$this->state['name'];
        $autre->abreviation=$this->state['abreviation'];
        $autre->price_prive=$this->state['price_prive'];
        $autre->price_abonne=$this->state['price_abonne'];
        $autre->save();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }
    public function mount(){
        $this->state['abreviation']="Aucune";
    }

    public function edit(Autre $autre){
        $this->state=$autre->toArray();
        $this->isEditable=true;
        $this->autreToEdit=$autre;
    }

    public function update(){
        $this->autreToEdit->name=$this->state['name'];
        $this->autreToEdit->abreviation=$this->state['abreviation'];
        $this->autreToEdit->price_prive=$this->state['price_prive'];
        $this->autreToEdit->price_abonne=$this->state['price_abonne'];
        $this->autreToEdit->update();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien mise à jour !']);
    }

    public function showDeleteDialog(Autre $autre){
        $this->dispatchBrowserEvent('delete-tarification-dialog');
        $this->autreToDelete=$autre;
    }

    public function delete(){
       if ($this->autreToDelete->changed==true) {
            $this->autreToDelete->changed=false;
       } else {
            $this->autreToDelete->changed=true;
       }
       $this->autreToDelete->update();
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
            $autres=Autre::where('changed',false)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        } else {
            $autres=Autre::where('changed',true)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        }
        return view('livewire.tarification.autre-page',['autres'=>$autres]);
    }
}
