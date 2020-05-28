<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    //
    protected $table = 'users_preference';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'notifications', 'notifications_web', 'notifications_movil', 'notifications_email', '2fa'
    ];
}
