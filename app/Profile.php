<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{

    protected $table = 'profiles';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [
        'name', 'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
