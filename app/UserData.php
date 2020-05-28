<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //
    protected $table = 'users_data';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'avatar', 'first_name', 'last_name', 'birth_date', 'dni', 'country', 'state', 'zip', 'address', 'photo_dni', 'photo_selfie'
    ];
}
