<?php
namespace App\Http\Livewire\Facturation;
use App\Helpers\Facture\Prive\FacturePriveHelper;
use Livewire\Component;

class FacturationPrivePage extends Component
{
    public function render()
    {
        $data=(new FacturePriveHelper())->getFactureByDay(date('Y-m-d'));
        return view('livewire.facturation.facturation-prive-page',['factures'=>$data]);
    }
}
