<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{

    protected $table = 'customers';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [
        'identification_card', 'name',
    ];




    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'seller_id', 'id');
    }
}
