<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'reviews';
    protected $fillable = ['id_user_issuer', 'id_user_recipient', 'message'];

    public function emitter()
    {
        return $this->belongsTo('App\User', 'id_user_issuer');
    }

    public function recipient()
    {
        return $this->belongsTo('App\User', 'id_user_recipient');
    }
}
