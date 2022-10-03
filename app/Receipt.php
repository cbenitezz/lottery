<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{

    protected $fillable = [
        'lottery_id','cashierer', 'ticket','payment','checkbook'
    ];


}
