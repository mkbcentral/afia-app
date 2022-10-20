<?php
    namespace App\Helpers\PatientHelper;
    class PatientHelper{

        public function create($name,$gender,$date_of_birth,$phone,$commune,$quartier,$numero,$type,$fiche_id,$service_id,$abonnement_id){
            if ($type=='' && $service_id==0 && $abonnement_id==0) {
                # code...
            } else if($service_id==0){
                # code...
            }

        }

    }
