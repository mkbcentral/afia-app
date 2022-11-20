<?php
    namespace App\Helpers\Facture\Prive;

use App\Helpers\Facture\FactureFormatNumberHelper;
use App\Models\FacturePrive;

    class FacturePriveHelper{
        public function create($consultation_id,$patient_id,$user_id,$month)
        {
            $number=(new FactureFormatNumberHelper())->formatPrive(date('m'),'GOLF');
            $existFacture=FacturePrive::where('patient_prive_id',$patient_id)
                                    ->where('month',date('m'))
                                    ->first();
            if ($existFacture) {
                $facture="exist";
            } else {
                $facture=FacturePrive::create([
                    'numero'=>$number,
                    'consultation_id'=>$consultation_id,
                    'patient_prive_id'=>$patient_id,
                    'user_id'=>$user_id,
                    'month'=>$month
                ]);
            }
            return $facture;
        }

        public function getFactureByDay($date){
            $factures=FacturePrive::whereDate('created_at',$date)->get();
            return $factures;
        }
        public function getFactureByMonth($month){
            $factures=FacturePrive::where('month',$month)->get();
            return $factures;
        }
    }
