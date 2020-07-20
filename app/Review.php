<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'reviews';
    protected $fillable = ['id_user_issuer', 'id_user_recipient', 'message'];

    
}
