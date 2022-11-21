<?php

namespace App\Http\Livewire\Tarification;

use App\Models\Echographie;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EchoPage extends Component
{
    public $isEditable=false,$isTrashed=false,$state=[],$echoToEdit,$echoToDelete,$keySearch="";
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
        $echo=new Echographie();
        $echo->name=$this->state['name'];
        $echo->abreviation=$this->state['abreviation'];
        $echo->price_prive=$this->state['price_prive'];
        $echo->price_abonne=$this->state['price_abonne'];
        $echo->save();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }
    public function mount(){
        $this->state['abreviation']="Aucune";
    }

    public function edit(Echographie $echo){
        $this->state=$echo->toArray();
        $this->isEditable=true;
        $this->echoToEdit=$echo;
    }

    public function update(){
        $this->echoToEdit->name=$this->state['name'];
        $this->echoToEdit->abreviation=$this->state['abreviation'];
        $this->echoToEdit->price_prive=$this->state['price_prive'];
        $this->echoToEdit->price_abonne=$this->state['price_abonne'];
        $this->echoToEdit->update();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien mise à jour !']);
    }

    public function showDeleteDialog(Echographie $echo){
        $this->dispatchBrowserEvent('delete-tarification-dialog');
        $this->echoToDelete=$echo;
    }

    public function delete(){
       if ($this->echoToDelete->changed==true) {
            $this->echoToDelete->changed=false;
       } else {
            $this->echoToDelete->changed=true;
       }
       $this->echoToDelete->update();
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
            $echos=Echographie::where('changed',false)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        } else {
            $echos=Echographie::where('changed',true)
            ->where('name','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        }
        return view('livewire.tarification.echo-page',['echos'=>$echos]);
    }
}
