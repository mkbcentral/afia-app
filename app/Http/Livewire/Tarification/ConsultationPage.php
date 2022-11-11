<?php

namespace App\Http\Livewire\Tarification;

use App\Models\Consultation;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ConsultationPage extends Component
{
    public $isEditable=false,$isTrashed=false,$state=[],$consultationToEdit,$consultationToDelete,$keySearch="";
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
        $consultation=new Consultation();
        $consultation->name=$this->state['name'];
        $consultation->abreviation=$this->state['abreviation'];
        $consultation->price_prive=$this->state['price_prive'];
        $consultation->price_abonne=$this->state['price_abonne'];
        $consultation->save();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }
    public function mount(){
        $this->state['abreviation']="Aucune";
    }

    public function edit(Consultation $consultation){
        $this->state=$consultation->toArray();
        $this->isEditable=true;
        $this->consultationToEdit=$consultation;
    }

    public function update(){
        $this->consultationToEdit->name=$this->state['name'];
        $this->consultationToEdit->abreviation=$this->state['abreviation'];
        $this->consultationToEdit->price_prive=$this->state['price_prive'];
        $this->consultationToEdit->price_abonne=$this->state['price_abonne'];
        $this->consultationToEdit->update();
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien mise à jour !']);
    }

    public function showDeleteDialog(Consultation $consultation){
        $this->dispatchBrowserEvent('delete-tarification-dialog');
        $this->consultationToDelete=$consultation;
    }

    public function delete(){
       if ($this->consultationToDelete->changed==true) {
            $this->consultationToDelete->changed=false;
       } else {
            $this->consultationToDelete->changed=true;
       }
       $this->consultationToDelete->update();
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
            $consultations=Consultation::where('changed',false)
            ->where('name','like','%'.$this->keySearch.'%')
            ->Where('abreviation','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        } else {
            $consultations=Consultation::where('changed',true)
            ->where('name','like','%'.$this->keySearch.'%')
            ->Where('abreviation','like','%'.$this->keySearch.'%')
            ->orderBy('name','ASC')
            ->get();
        }
        return view('livewire.tarification.consultation-page',['labos'=>$consultations]);
    }
}
