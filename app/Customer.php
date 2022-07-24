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
        return $this->belongsTo('App\Ticket','ticket_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
