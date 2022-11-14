<?php
    namespace App\Helpers\Facture;

use App\Models\FacturePrive;

    class FactureFormatNumberHelper{
        public function formatPrive($month){
            $factures=FacturePrive::where('month',$month)->get();
            $number=sprintf('%03d',$factures->count()+1).'.'.$month.'.'.date('y').'PS';
            return $number;
        }

        public function formatAbonne(){

        }

        public function formatPersonnel(){

        }
    }
