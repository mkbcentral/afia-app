<?php

namespace App\Http\Controllers;

use App\Helpers\Fiches\FicheHelper;
use App\Helpers\Patients\PatientHelper;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
       return (new FicheHelper())->create('A003','PErsonnel','Golf');
    }

    public function test2(){
        return (new PatientHelper())->create('KALENGA','M','1993-03-03','02255','zzaa','aazz','001','Agent',2,1,0,false);
     }
}
