<?php

namespace App\Http\Controllers;

use App\Helpers\Fiches\FicheHelper;
use App\Helpers\Others\OtherHelper;
use App\Helpers\Patients\PatientHelper;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
       return (new OtherHelper())->createServiceType('Fils');
    }
    public function test2(){
        $checkPatient=(new PatientHelper())->chekIfPatientExist('KALENGA','1993-03-03','Personnel');
        dd($checkPatient);
        return (new PatientHelper())->create('M025','KALENGA','M','1993-03-03','02255','zzaa','aazz','001','Agent',4,0,1,false);
    }
}
