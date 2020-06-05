<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    //
  protected $table = 'users_payments';
  protected $fillable = ['id_user','ammount','upload',  'type', 'state' ];
}
