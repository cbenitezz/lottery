<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{

    protected $fillable = [
        'cashierer', 'ticket','payment','checkbook'
    ];


}
