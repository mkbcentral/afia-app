<?php
namespace App\Helpers\Facture\Prive;

use App\Models\FacturePrive;

class FacturePriveAmountHelper{

    public function getFactureAmout($id){

        $facture=FacturePrive::find($id);

        $total=0;
        $amount_consultation=0;
        $amount_labo=0;$amount_radio=0;$amount_echo=0;$amount_acte=0;$amount_autre=0;

        $amount_consultation=$facture->consultation->price_prive;

        //get labo total
        foreach ($facture->examenLabos as $labo) {
            $amount_labo+=$labo->price_prive;
        }
        //get radio total
        foreach ($facture->examenRadios as $radio) {
            $amount_radio+=$radio->price_prive;
        }
        //get echo total
        foreach ($facture->examenEchoes as $echo) {
            $amount_echo+=$echo->price_prive;
        }
        //get acte total
        foreach ($facture->actes as $acte) {
            $amount_acte+=$acte->price_prive;
        }
        //get autre total
        foreach ($facture->autres as $autre) {
            $amount_autre+=$autre->price_prive;
        }


        $total+=$amount_consultation+$amount_labo+$amount_radio+$amount_echo+$amount_acte+$amount_autre;

        return $total;

    }

}
