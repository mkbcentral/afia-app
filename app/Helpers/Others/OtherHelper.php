<?php
namespace App\Helpers\Others;

use App\Models\Abonnement;
use App\Models\PatientType;
use App\Models\PersonnelService;

class OtherHelper{
    //Créer un nouvel abonnement
    public function createAbonnement($name){
        $abonnement=Abonnement::create([
            'name'=>$name
        ]);
        return $abonnement;
    }
    //Créer un nouveau service
    public function createService($name){
        $service=PersonnelService::create([
            'name'=>$name
        ]);
        return $service;
    }

    //Créer un nouveau service
    public function createServiceType($name){
        $service=PatientType::create([
            'name'=>$name
        ]);
        return $service;
    }
}
