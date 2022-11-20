<?php
namespace App\Helpers\Facture\Prive;

use App\Models\FacturePrive;

class FacturePriveAmountHelper{

    public function getFactureAmout($id){

        $facture=FacturePrive::find($id);

        $total=0;
        $amount_consultation=0;

        $amount_consultation=$facture->consultation->price_prive;
        $total+=$amount_consultation;

        return $total*2000;

    }

}
