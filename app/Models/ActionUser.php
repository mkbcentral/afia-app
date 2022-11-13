<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionUser extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $casts=[
        'date','date',
        'time'=>'datetime'
    ];


    public function getDateAttribute($value){
        return Carbon::parse($value)->toFormattedDate();
    }

    public function getTimeAttribute($value){
        return Carbon::parse($value)->toFormattedTime();
    }
}
