<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    //
    protected $table = 'users_plan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'id_plan'
    ];
}
