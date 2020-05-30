<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    //

      protected $table = 'users_log';

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'id_user', 'remote_ip'
      ];
}
