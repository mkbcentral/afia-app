<?php
namespace App\Helpers\Others;

use Carbon\Carbon;

class DateFromatHelper{
    //Formatter la date dd/mm/yyyy à Y-d-m
    public function formatDate($date){
        return Carbon::createFromFormat('d/m/Y',$date)->format('Y-m-d');
    }
}
