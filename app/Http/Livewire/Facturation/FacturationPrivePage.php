<?php
namespace App\Http\Livewire\Facturation;
use App\Helpers\Facture\Prive\FacturePriveHelper;
use App\Models\FacturePrive;
use Livewire\Component;

class FacturationPrivePage extends Component
{
    public $factureData;
    public function show(FacturePrive $facture){
        $this->factureData=$facture;
    }
    public function render()
    {
        $data=(new FacturePriveHelper())->getFactureByDay(date('Y-m-d'));
        return view('livewire.facturation.facturation-prive-page',['factures'=>$data]);
    }
}
