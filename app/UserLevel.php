<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    //

        protected $table = 'users_levels';
        protected $primaryKey = 'id';
        public $timestamps = false;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name'
        ];
}
