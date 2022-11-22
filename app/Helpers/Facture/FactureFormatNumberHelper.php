<?php
    namespace App\Helpers\Facture;

    use App\Models\FacturePrive;

    class FactureFormatNumberHelper{
        public function formatPrive($month,$source){
            $factures=FacturePrive::where('month',$month)->get();
           if ($source=="GOLF") {
            $number=sprintf('%03d',$factures->count()+1).'-'.$month.'-'.date('y').'.'-'PS-G';
           } else {
            $number=sprintf('%03d',$factures->count()+1).'-'.$month.'-'.date('y').'-'.'PS-V';
           }
            return $number;
        }

        public function formatAbonne(){

        }

        public function formatPersonnel(){

        }
    }
