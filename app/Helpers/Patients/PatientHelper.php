<?php
namespace App\Helpers\Patients;

use App\Models\PatientAbonne;
use App\Models\PatientPersonnel;
use App\Models\PatientPrive;
    class PatientHelper{
        //Create new Patient
        public function create($matricule="",$name,$gender,$date_of_birth,$phone,$commune,$quartier,$numero,$type='',$fiche_id=0,$service_id=0,$abonnement_id=0,$is_prodeo=false){
            if ($matricule==""&& $type=='' && $service_id==0 && $abonnement_id==0) {
                //Create private patient
                $patient=new PatientPrive();
                $patient->name=$name;
                $patient->gender=$gender;
                $patient->date_of_birth=$date_of_birth;
                $patient->phone=$phone;
                $patient->commune=$commune;
                $patient->numero=$numero;
                $patient->fiche_id=$fiche_id;
                $patient->is_prodeo=$is_prodeo;
            } else if($service_id==0){
               //Create subscriber patient
                $patient=new PatientAbonne();
                $patient->matricule=$matricule;
                $patient->name=$name;
                $patient->gender=$gender;
                $patient->date_of_birth=$date_of_birth;
                $patient->phone=$phone;
                $patient->commune=$commune;
                $patient->numero=$numero;
                $patient->type=$type;
                $patient->fiche_id=$fiche_id;
                $patient->abonnement_id=$abonnement_id;

            }else{
                //Create personnel patient
                $patient=new PatientPersonnel();
                $patient->name=$name;
                $patient->gender=$gender;
                $patient->date_of_birth=$date_of_birth;
                $patient->phone=$phone;
                $patient->commune=$commune;
                $patient->numero=$numero;
                $patient->type=$type;
                $patient->fiche_id=$fiche_id;
                $patient->personnel_service_id=$service_id;
            }
            $patient->save();
            return $patient;
        }
        //Check if patient exist
        public function chekIfPatientExist($name,$date_of_birth,$type){
            if ($type=="Abonné") {
                $patient=PatientAbonne::where('name',$name)->where('date_of_birth',$date_of_birth)->first();
            } else if($type=="Privé") {
                $patient=PatientPrive::where('name',$name)->where('date_of_birth',$date_of_birth)->first();
            }else{
                $patient=PatientPersonnel::where('name',$name)->where('date_of_birth',$date_of_birth)->first();
            }
            return $patient;
        }
    }
