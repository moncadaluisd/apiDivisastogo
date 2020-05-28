<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_level', 'email', 'password', 'username', 'email_verify', 'phone', 'phone_verify', 'token_verify', 'verified', 'remember_token', 'google_auth_code', 'state', 'last_login','email_token', 'phone_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token_verify', 'last_login','google_auth_code','email_token', 'phone_token', 'id_level'
    ];

    /*
    * JWT function
     */

    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    /*
    * JWT function
     */

    public function getJWTCustomClaims()
    {
      return [];
    }

    /*
    * Relationships with model UserLevel
     */
    public function level()
    {
        return $this->belongsTo('App\UserLevel', 'id_user');
    }
    /*
    * Relationships with model UserData
     */
    public function data()
    {
      return $this->hasMany('App\UserData', 'id_user');
    }

    /*
    * Relationships with model UserLog
     */
    public function log()
    {
      return $this->hasMany('App\UserLog', 'id_user');
    }

    /*
    * Relationships with model UserPlan
    */
    public function plan()
    {
      return $this->belongsToMany('App\UserPlan', 'users_plan', 'id_user', 'id_plan');
    }

    /*
    * Relationships with model UserPreference
    */
    public function preference()
    {
      return $this->hasMany('App\UserPreference', 'id_user');
    }

    /*
    * Relationships with model UserPayment
    */
    public function payment()
    {
      return $this->hasMany('App\UserPayment', 'id_user');
    }




}
