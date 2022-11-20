<?php

namespace App\Http\Livewire\Facturation\Prive;

use App\Models\ExamenLabo;
use App\Models\ExamenRadio;
use App\Models\FacturePrive;
use Livewire\Component;
use PhpParser\Builder\Function_;

class CreateFactureprivePage extends Component
{
    public $factureData,$facture;
    public $labos=[],$radios;


    public $itemsLabo=[],$itemsRadio=[];

    public function mount(){
        $this->factureData=FacturePrive::find($this->facture);
        $this->labos=ExamenLabo::where('changed',false)->get();
        $this->radios=ExamenRadio::where('changed',false)->get();
    }
    //Save detail examens labo
    public function saveLabos(){
        if ($this->itemsLabo==[]) {
            dd("Vide");
        } else {
            if ($this->factureData->examenLabos()->sync($this->itemsLabo,false)) {
                dd("Added");
            }
        }
       //$this->dispatchBrowserEvent('data-added',['message'=>'Infos bien ajoutée !']);
    }
    //Save detail examens radio
    public function saveRadios(){
        if ($this->itemsRadio==[]) {
            dd("Vide");
        } else {
            if ($this->factureData->examenRadios()->sync($this->itemsRadio,false)) {
                dd("Added");
            }
        }
       //$this->dispatchBrowserEvent('data-added',['message'=>'Infos bien ajoutée !']);
    }
    public function render()
    {
        return view('livewire.facturation.prive.create-factureprive-page');
    }
}
