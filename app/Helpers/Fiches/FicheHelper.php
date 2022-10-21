<?php
    namespace App\Helpers\Fiches;

use App\Models\Fiche;

    class FicheHelper{
        //Create new fache
        public function create($numero,$type,$source){
            $fiche=Fiche::create([
                'numero'=>$numero,
                'type'=>$type,
                'source'=>$source,
            ]);
            return $fiche;
        }
        //Update fiche
        public function update($id,$numero,$type,$source){
            $fiche=Fiche::find($id);
            $fiche->numero=$numero;
            $fiche->type=$type;
            $fiche->source=$source;
            $fiche->update();
            return $fiche;
        }
        //Delete fiche
        public function delete($id){
            $fiche=Fiche::find($id);
            return $fiche;
        }
    }
