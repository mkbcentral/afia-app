<?php

namespace App\Http\Livewire\Tarification;

use App\Models\ExamenLabo;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class LaboPage extends Component
{

    public $isEditable=false,$isTrashed=false,$state=[],$laboToEdit,$laboToDelete,$keySearch="";
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
        $labo=new ExamenLabo();
        $labo->name=$this->state['name'];
        $labo->abreviation=$this->state['abreviation'];
        $labo->price_prive=$this->state['price_prive'];
        $labo->price_abonne=$this->state['price_abonne'];
        $labo->save();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }
    public function mount(){
        $this->state['abreviation']="Aucune";
    }

    public function edit(ExamenLabo $labo){
        $this->state=$labo->toArray();
        $this->isEditable=true;
        $this->laboToEdit=$labo;
    }

    public function update(){
        $this->laboToEdit->name=$this->state['name'];
        $this->laboToEdit->abreviation=$this->state['abreviation'];
        $this->laboToEdit->price_prive=$this->state['price_prive'];
        $this->laboToEdit->price_abonne=$this->state['price_abonne'];
        $this->laboToEdit->update();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien mise à jour !']);
    }

    public function showDeleteDialog(ExamenLabo $labo){
        $this->dispatchBrowserEvent('delete-tarification-dialog');
        $this->laboToDelete=$labo;
    }

    public function delete(){
       if ($this->laboToDelete->changed==true) {
            $this->laboToDelete->changed=false;
       } else {
            $this->laboToDelete->changed=true;
       }
       $this->laboToDelete->update();
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
            $labos=ExamenLabo::where('changed',false)
            ->where('name','like','%'.$this->keySearch.'%')
            ->Where('abreviation','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        } else {
            $labos=ExamenLabo::where('changed',true)
            ->where('name','like','%'.$this->keySearch.'%')
            ->Where('abreviation','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        }

        return view('livewire.tarification.labo-page',['labos'=>$labos]);
    }
}
