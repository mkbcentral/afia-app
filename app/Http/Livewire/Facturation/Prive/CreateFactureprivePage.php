<?php

namespace App\Http\Livewire\Facturation\Prive;

use App\Models\ExamenLabo;
use App\Models\FacturePrive;
use Livewire\Component;
use PhpParser\Builder\Function_;

class CreateFactureprivePage extends Component
{
    public $factureData,$facture;
    public $labos=[];


    public $itemsLabo=[];

    public function mount(){
        $this->factureData=FacturePrive::find($this->facture);
        $this->labos=ExamenLabo::where('changed',false)->get();
    }

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
    public function render()
    {
        return view('livewire.facturation.prive.create-factureprive-page');
    }
}
