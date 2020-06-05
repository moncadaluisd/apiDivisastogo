<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    //
    protected $table = 'users_wallet';
    protected $fillable = [
      'id_user',
      'wallet',
    
    ];
}
