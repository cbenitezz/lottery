<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lottery extends Model 
{

    protected $table = 'lotteries';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

}