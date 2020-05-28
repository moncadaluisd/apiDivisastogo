<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    //

      protected $table = 'users_log';
      protected $primaryKey = 'id';
      public $timestamps = false;
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'id_user', 'remote_ip', 'login_date'
      ];
}
