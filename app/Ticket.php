<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model 
{

    protected $table = 'tickets';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function lotteries()
    {
        return $this->belongsTo('App\Lottery');
    }

}