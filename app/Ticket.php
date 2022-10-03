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
        return $this->belongsTo('App\User','user_id');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function customers()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function lotteries()
    {
        return $this->belongsTo('App\Lottery','lottery_id');
    }

}
