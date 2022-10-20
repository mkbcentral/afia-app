<?php
    namespace App\Helpers\Fiches;

use App\Models\Fiche;

    class FicheHelper{
        //Crezte new fache
        public function create($numero,$type,$source){
            $fiche=Fiche::create([
                'numero'=>$numero,
                'type'=>$type,
                'source'=>$source,
            ]);
            return $fiche;
        }
    }
